<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::redirect('/login', '/auth/login')->name('login');

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('auth.view-login');
    Route::post('login', 'login')->name('auth.login');
    Route::get('register', 'showRegister')->name('auth.view-register');
    Route::post('register', 'register')->name('auth.register');
});

Route::prefix('/')->group(function () {
    Route::prefix('dashboard')->controller(DashboardController::class)->middleware(['auth'])->group(function () {
        Route::get('/', 'index')->name('dashboard.index');
    });
});
