<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function () {

    // Login Routes
    Route::get("login",[LoginController::class,"create"])->name("login");
    Route::post("login",[LoginController::class,"store"]);

    // Register Routes
    Route::get('register',[RegisterController::class,'create'])
    ->name('register');
    Route::post('register',[RegisterController::class,'store']);


});

Route::middleware("auth")->group(function () {
    Route::post('logout',[LoginController::class,'destroy']
    )->name('logout');
});