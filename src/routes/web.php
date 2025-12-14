<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

Route::redirect('/login', '/auth/login')->name('login');

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('auth.view-login');
    Route::post('login', 'login')->name('auth.login');
    Route::get('register', 'showRegister')->name('auth.view-register');
    Route::post('register', 'register')->name('auth.register');
});

Route::prefix('/')->group(function () {
    Route::prefix('tarefas')->controller(TaskController::class)->middleware(['auth'])->group(function () {
        Route::get('/', 'index')->name('tasks.index');
        Route::post('/', 'store')->name('tasks.store');
        Route::get('/nova-tarefa', 'create')->name('tasks.create');
        Route::put('/completar-tarefa/{task}', 'completeTask')->name('tasks.complete');
    });
});
