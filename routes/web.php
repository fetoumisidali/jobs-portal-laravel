<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('home');


Route::prefix('/jobs')->as('jobs.')->group(function () {
    Route::get('/', [JobController::class, 'index'])->name('index');
    Route::get('/create', [JobController::class, 'create'])->name('create')
    ->middleware('auth');
    Route::post('/', [JobController::class, 'store'])->name('store')
    ->middleware('auth');
    Route::get('/{job}', [JobController::class, 'show'])->name('show');
    Route::get('/{job}/edit', [JobController::class, 'edit'])->name('edit')
    ->middleware('auth');
    Route::put('/{job}', [JobController::class, 'update'])->name('update')
    ->middleware('auth');
    Route::delete('/{job}', [JobController::class, 'destroy'])->name('destroy')
    ->middleware('auth');

});

Route::get('dashboard',[DashboardController::class,'index'])
->middleware("auth")->name('dashboard');





require __DIR__ . '/auth.php';