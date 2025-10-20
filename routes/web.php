<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisterdUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [RegisterdUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisterdUserController::class, 'store']);
});
