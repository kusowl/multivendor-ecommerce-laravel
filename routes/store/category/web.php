<?php

use App\Http\Controllers\Store\StoreCategoryController;

Route::get('/categories', [StoreCategoryController::class, 'index'])->name('store.categories');
