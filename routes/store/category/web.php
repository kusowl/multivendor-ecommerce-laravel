<?php

use App\Http\Controllers\Store\StoreCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/categories', [StoreCategoryController::class, 'index'])->name('store.categories');
Route::get('/categories/{category:slug}', [StoreCategoryController::class, 'show'])->name('store.categories.show');

/* SubCategory route-model binding is not working, so i proceeded with manual approach */
Route::get('/categories/{category:slug}/{subCategorySlug}', [StoreCategoryController::class, 'showSubcategory'])->name(
    'store.categories.subCategories.show',
);
