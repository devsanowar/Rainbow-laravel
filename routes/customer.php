<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\LoginController;
use App\Http\Controllers\Customer\RegisterController;


Route::prefix('customer')->group(function () {
    Route::get('register/form/', [RegisterController::class, 'register'])->name('customer.registerForm');
    Route::post('register', [RegisterController::class, 'store'])->name('customer.register');

    Route::get('login/form/', [LoginController::class, 'showLoginForm'])->name('customer.loginForm');
    Route::post('login', [LoginController::class, 'login'])->name('customer.login');


    Route::post('logout', [RegisterController::class, 'logout'])->name('customer.logout');

});


Route::prefix('customer')->middleware(['customer'])->group(function () {
    Route::get('dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
});

