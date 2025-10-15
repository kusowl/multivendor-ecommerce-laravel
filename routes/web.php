<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterdUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [RegisterdUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisterdUserController::class, 'store']);
});

Route::get('/dashboard', [DashboardController::class, 'index' ])->name('dashboard.index');
Route::group(['prefix' => 'dashboard'], function () {
   Route::get('category', [\App\Http\Controllers\CategoryController::class, 'create'])->name('dashboard.category');
});
