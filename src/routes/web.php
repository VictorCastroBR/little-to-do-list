<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('login', 'showLogin');
});
