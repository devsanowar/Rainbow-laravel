<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dealer\DealerController;
use App\Http\Controllers\Dealer\RegisterController;


Route::prefix('dealer')->group(function () {
    // Don't protect these with customer middleware
    Route::get('login', [RegisterController::class, 'showLoginForm'])->name('dealer.login');
    Route::post('login', [RegisterController::class, 'login'])->name('dealer.login.submit');
    Route::post('logout', [RegisterController::class, 'logout'])->name('dealer.logout');

    Route::get('register', [RegisterController::class, 'register'])->name('dealer.register');

    Route::post('register-store', [RegisterController::class, 'store'])->name('dealer.store');


    // Only protect authenticated routes
    Route::middleware(['dealer'])->group(function () {
        Route::get('dashboard', [DealerController::class, 'dashboard'])->name('dealer.dashboard');
    });
});
