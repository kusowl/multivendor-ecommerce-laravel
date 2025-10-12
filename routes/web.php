<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('guest')->group(function () {
    Route::get('/login', fn() => view('auth.login'))->name('login');
    Route::get('/register', [\App\Http\Controllers\RegisterdUserController::class, 'create'])->name('register');
    Route::post('/register', [\App\Http\Controllers\RegisterdUserController::class, 'store']);
});
