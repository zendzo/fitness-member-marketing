<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/lead', [LeadController::class, 'index'])->name('lead.index');
    Route::get('/lead/create', [LeadController::class, 'create'])->name('lead.create');
    Route::post('/lead/store', [LeadController::class, 'store'])->name('lead.store');
    Route::get('/lead/edit/{lead}', [LeadController::class, 'edit'])->name('lead.edit');

    Route::patch('/lead/update/{lead}', [LeadController::class, 'update'])->name('lead.update');
    
});


Route::get('/', WelcomeController::class);

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
