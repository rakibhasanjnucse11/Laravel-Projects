<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PortfolioController;

// Public Homepage (landing page)
Route::get('/', function () {
    return view('welcome'); // Your landing page
});

// Public portfolio pages
Route::get('/portfolio/{username}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('/portfolio/{user}/{template}/download', [PortfolioController::class, 'download'])->name('portfolio.download');
Route::get('/portfolio/{username}/{template?}', [PortfolioController::class, 'show'])->name('portfolio.show');

Route::middleware(['auth'])->group(function () {
    Route::resource('projects', ProjectController::class);
});

use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('welcome');
});

// Registration routes
Route::get('/register', function () {
    return view('auth.register');  // You must create this view!
})->middleware('guest')->name('register');

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

use App\Http\Controllers\CVController;

Route::get('/cv', [CVController::class, 'show'])->name('cv.show');
Route::get('/cv/download', [CVController::class, 'download'])->name('cv.download');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});




use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


// Authenticated routes
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    // Projects resource routes
    Route::resource('projects', ProjectController::class)->except(['show']);

    // If you have show method for projects uncomment below:
    // Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
});

require __DIR__.'/auth.php';
