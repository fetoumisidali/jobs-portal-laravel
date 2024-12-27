<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

uses(RefreshDatabase::class);

test('fields has errors', function () {
    $this->post('/register')
    ->assertSessionHasErrors(['username','email','password']);
});



// defer to make sure that the user is registered 
// this is not chatgpt comment :)
test('user register (this is high order test)')->defer(function () {
    $this->post('/register',[
        'username' => 'tonymontana',
        'email'=> 'tony@montana.com',
        'password'=> 'ilovemiami',
        ]
    )->assertRedirect('/');
})->assertAuthenticated()->assertDatabaseHas('users' , ['email' => 'tony@montana.com']);



    

