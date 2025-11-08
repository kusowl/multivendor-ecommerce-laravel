<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::delete('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
