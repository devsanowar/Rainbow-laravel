<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Member\LocationController;
use App\Http\Controllers\Member\RegisterController;

Route::prefix('member')->middleware(['auth', 'member'])->group(function () {


});

Route::get('register', [RegisterController::class, 'register'])->name('member.register');
Route::get('/get-districts/{division_id}', [LocationController::class, 'getDistricts']);
Route::get('/get-upazilas/{district_id}', [LocationController::class, 'getUpazilas']);
Route::get('/get-unions/{upazila_id}', [LocationController::class, 'getUnions']);
