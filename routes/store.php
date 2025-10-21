<?php

use App\Http\Controllers\Store\StoreCategoryController;
use App\Http\Controllers\Store\StoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StoreController::class, 'index'])->name('home');
Route::get('/categories', [StoreCategoryController::class, 'index'])->name('store.categories');
