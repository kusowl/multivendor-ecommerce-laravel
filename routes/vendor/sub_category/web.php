<?php

use App\Http\Controllers\Dashboard\SubCategoryController;

Route::get('sub-category', [SubCategoryController::class, 'index'])->name('dashboard.sub-category');
Route::get('sub-category/create', [SubCategoryController::class, 'create'])->name('dashboard.sub-category.create');
Route::post('sub-category/create', [SubCategoryController::class, 'store']);
Route::get('sub-category/{subCategory:slug}/edit', [SubCategoryController::class, 'edit'])->name('dashboard.sub-category.edit');
Route::patch('sub-category/{subCategory:slug}/update', [SubCategoryController::class, 'update'])->name('dashboard.sub-category.update');
Route::delete('sub-category/{subCategory:slug}/delete', [SubCategoryController::class, 'destroy'])->name('dashboard.sub-category.delete');
