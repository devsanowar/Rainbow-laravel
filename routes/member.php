<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Member\LocationController;
use App\Http\Controllers\Member\RegisterController;


Route::get('register/form', [RegisterController::class, 'register'])->name('member.registerForm');
Route::get('/get-districts/{division_id}', [LocationController::class, 'getDistricts']);
Route::get('/get-upazilas/{district_id}', [LocationController::class, 'getUpazilas']);
Route::get('/get-unions/{upazila_id}', [LocationController::class, 'getUnions']);
Route::get('register', [RegisterController::class, 'register'])->name('member.register');


Route::prefix('member')->middleware(['auth', 'member'])->group(function () {


});

