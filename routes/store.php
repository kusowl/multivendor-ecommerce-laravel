<?php

use App\Http\Controllers\Store\StoreCategoryController;
use App\Http\Controllers\Store\StoreController;
use App\Http\Controllers\Store\StoreProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StoreController::class, 'index'])->name('home');
Route::get('/categories', [StoreCategoryController::class, 'index'])->name('store.categories');
Route::get('/products', [StoreProductController::class, 'index'])->name('store.products');
Route::get('/products/{product:slug}', [StoreProductController::class, 'show'])->name('store.products.show');
