<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('category', [CategoryController::class, 'index'])->name('dashboard.category');
    Route::get('category/create', [CategoryController::class, 'create'])->name('dashboard.category.create');
    Route::post('category/create', [CategoryController::class, 'store']);
    Route::get('category/{category:slug}/edit', [CategoryController::class, 'edit'])->name('dashboard.category.edit');
    Route::patch('category/{category:slug}/update', [CategoryController::class, 'update'])->name('dashboard.category.update');
    Route::delete('category/{category:slug}/delete', [CategoryController::class, 'destroy'])->name('dashboard.category.delete');

    Route::get('sub-category', [SubCategoryController::class, 'index'])->name('dashboard.sub-category.index');
    Route::get('sub-category/create', [SubCategoryController::class, 'create'])->name('dashboard.sub-category.create');
    Route::post('sub-category/create', [SubCategoryController::class, 'store']);

    Route::get('product', [ProductController::class, 'create'])->name('dashboard.product');
    Route::post('product', [ProductController::class, 'store']);
});
