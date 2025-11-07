<?php

use App\Http\Controllers\Dashboard\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('category/{category:id}/subcategory', [CategoryController::class, 'subCategories'])->name('dashboard.category.subcategory');
