<?php

use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;



uses(RefreshDatabase::class);


it('fields errors' , function(){
    $this->post('/login')
    ->assertSessionHasErrors(['email','password']);
});

it('redirect auth users', function(){
    $user = User::factory()->create();

    $this->actingAs($user)->get(route('login'))->
    assertStatus(302);
});

it("user can log in", function () {

    User::factory()->create([
        'username' => 'dexter',
        'email' => 'dexter@morgan.usa',
        'password' => bcrypt('showtime'),
    ]);

    $response = $this->post('/login',
    [
        'email' => 'dexter@morgan.usa',
        'password' => 'showtime'
    ]);
    $response->assertRedirect(route('home'));

    $this->assertAuthenticated();

});


