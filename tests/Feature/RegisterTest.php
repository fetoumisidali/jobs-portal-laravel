<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('fields has errors', function () {
    $this->post('/register')
    ->assertSessionHasErrors(['name','email','password']);
});

test('user can register',function(){
    $response = $this->post('/register', [
        'name' => 'email',
        'email' => 'test@user.com',
        'password' => 'password'
    ]);
    $this->assertAuthenticated();
    $response->assertRedirect(route('home'));
});