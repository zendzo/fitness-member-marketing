<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard', [DashboardController::class, 'index']);
    
});


Route::get('/', WelcomeController::class);

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
