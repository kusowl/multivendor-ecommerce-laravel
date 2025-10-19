<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterdUserController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [RegisterdUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisterdUserController::class, 'store']);
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('category', [CategoryController::class, 'create'])->name('dashboard.category');
    Route::post('category', [CategoryController::class, 'store']);

    Route::get('sub-category', [SubCategoryController::class, 'create'])->name('dashboard.sub-category');
    Route::post('sub-category', [SubCategoryController::class, 'store']);

    Route::get('product', [ProductController::class, 'create'])->name('dashboard.product');
    Route::post('product', [ProductController::class, 'store']);
});
