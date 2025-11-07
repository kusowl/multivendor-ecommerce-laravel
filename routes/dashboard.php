<?php

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::group(['prefix' => 'dashboard'], function () {
    require __DIR__.'/vendor/vendor.php';
});
