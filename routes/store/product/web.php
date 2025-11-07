<?php

use App\Http\Controllers\Store\StoreProductController;

Route::get('/products', [StoreProductController::class, 'index'])->name('store.products');
Route::get('/products/{product:slug}', [StoreProductController::class, 'show'])->name('store.products.show');
