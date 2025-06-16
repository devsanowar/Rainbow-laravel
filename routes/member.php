<?php

use App\Http\Controllers\Member\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Member\LocationController;
use App\Http\Controllers\Member\LoginController;
use App\Http\Controllers\Member\RegisterController;




Route::prefix('member')->group(function () {
    Route::get('register/form', [RegisterController::class, 'registerForm'])->name('member.registerForm');
    Route::get('get-districts/{division_id}', [LocationController::class, 'getDistricts']);
    Route::get('get-upazilas/{district_id}', [LocationController::class, 'getUpazilas']);
    Route::get('get-unions/{upazila_id}', [LocationController::class, 'getUnions']);
    Route::post('register', [RegisterController::class, 'register'])->name('member.register');

    Route::get('login/form', [LoginController::class, 'loginForm'])->name('member.loginForm');
    Route::post('login', [LoginController::class, 'login'])->name('member.login');
    Route::post('logout', [LoginController::class, 'loginout'])->name('member.logout');
});


Route::prefix('member')->middleware(['member'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('member.dashboard');
});

