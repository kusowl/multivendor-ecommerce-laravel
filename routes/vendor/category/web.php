<?php

use App\Http\Controllers\Dashboard\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('category', [CategoryController::class, 'index'])->name('dashboard.category');
Route::get('category/create', [CategoryController::class, 'create'])->name('dashboard.category.create');
Route::post('category/create', [CategoryController::class, 'store']);
Route::get('category/{category:slug}/edit', [CategoryController::class, 'edit'])->name('dashboard.category.edit');
Route::patch('category/{category:slug}/update', [CategoryController::class, 'update'])->name('dashboard.category.update');
Route::delete('category/{category:slug}/delete', [CategoryController::class, 'destroy'])->name('dashboard.category.delete');
