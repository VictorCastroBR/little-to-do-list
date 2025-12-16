<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

Route::redirect('/', '/tarefas');
Route::redirect('/login', '/auth/login')->name('login');

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('login', 'showLogin')->name('auth.view-login');
    Route::post('login', 'login')->name('auth.login');
    Route::get('register', 'showRegister')->name('auth.view-register');
    Route::post('register', 'register')->name('auth.register');
    Route::post('logout', 'logout')->name('auth.logout');
});

Route::prefix('/')->group(function () {
    Route::prefix('tarefas')->controller(TaskController::class)->middleware(['auth'])->group(function () {
        Route::get('/', 'index')->name('tasks.index');
        Route::post('/', 'store')->name('tasks.store');
        Route::put('/{task}', 'update')->name('tasks.update');
        Route::delete('/{task}', 'delete')->name('tasks.delete');
        Route::get('/nova-tarefa', 'create')->name('tasks.create');
        Route::get('/editar-tarefa/{task}', 'edit')->name('tasks.edit');
        Route::put('/completar-tarefa/{task}', 'completeTask')->name('tasks.complete');
    });
});
