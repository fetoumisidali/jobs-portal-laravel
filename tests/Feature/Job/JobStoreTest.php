<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
uses(RefreshDatabase::class);



it("only for auth users")
->post('/jobs')->assertRedirect('/login');


it("fields has errors")->todo();


it("user can create job")->todo();


