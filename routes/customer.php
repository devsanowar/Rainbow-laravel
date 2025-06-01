<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\RegisterController;


Route::prefix('customer')->group(function () {
    // Don't protect these with customer middleware
    Route::get('login', [RegisterController::class, 'showLoginForm'])->name('customer.login');
    Route::post('login', [RegisterController::class, 'login'])->name('customer.login.submit');
    Route::post('logout', [RegisterController::class, 'logout'])->name('customer.logout');

    Route::get('register', [RegisterController::class, 'register'])->name('customer.register');

    Route::post('register-store', [RegisterController::class, 'store'])->name('customer.store');


    // Only protect authenticated routes
    Route::middleware(['customer'])->group(function () {
        Route::get('dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    });
});

