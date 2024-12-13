<?php

use App\Models\Job;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);


test('assert jobs.index route is accessible and contain jobs', function () {
    
    Job::factory()->count(12)->create();

    $response = $this->get(route('jobs.index'));

    $response->assertStatus(200);

    $response->assertViewIs('jobs.index');

    $response->assertViewHas('jobs');

    $jobs = $response->viewData('jobs');

    $this->assertCount(6,$jobs->items());

});

test('assert create route is guarded', function () {
    $response = $this->get(route('jobs.create'));
    $response->assertRedirect(route('login'));
});

test('assert auth users can access create route', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get(route('jobs.create'))->
    assertStatus(200);
});


test('assert store route has fields errors', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->post(route('jobs.store'))
    ->assertSessionHasErrors([
        'title',
        'location',
        'requirements',
        'remote',
        'company_name',
        'contact_email',
        'job_type',
        'category',
        'description',
        'salary'
    ]);
});

test('assert auth user can create job', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->post(route('jobs.store'),[
        'title' => 'Example Job',
        'location' => 'Algeria',
        'requirements' => 'html,css,JavaScript,Laravel....',
        'remote' => true,
        'company_name' => 'Laravel Limited',
        'contact_email' => 'laravel@company.com',
        'job_type' => 'Full Time',
        'category' => 'IT',
        'description' => 'we are looking for talented laravel developer for our new project',
        'salary' => 1000
    ])
        ->assertRedirect(route('jobs.create'));

    $this->assertDatabaseHas(
        'listing_jobs',
        [
            'title' => 'Example Job'
        ]
    );
});

test('assert user cant delete other jobs', function () {    

    $user1  = User::factory()->create();
    $user2  = User::factory()->create();

    $job = Job::factory()->create(
        ['user_id' => $user1->id]
    );

    $response = $this->actingAs($user2)->delete(route('jobs.destroy', ['job'=> $job]));

    $response->assertStatus(403);

});

test('assert user cant edit other jobs', function () {

    $user1  = User::factory()->create();
    $user2  = User::factory()->create();

    $job = Job::factory()->create(
        ['user_id' => $user1->id]
    );


    $response = $this->actingAs($user2)->get(route('jobs.edit', ['job' => $job]));

    $response->assertStatus(403);
});


