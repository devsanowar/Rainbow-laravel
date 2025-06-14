<?php

use App\Http\Controllers\Member\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::prefix('member')->middleware(['auth', 'member'])->group(function () {


});

Route::get('register', [RegisterController::class, 'register'])->name('member.register');
