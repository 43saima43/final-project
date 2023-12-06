<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Marketing\Auth\AuthController;
use App\Http\Controllers\Backend\Marketing\Profile\ProfileController;
use App\Http\Controllers\Backend\Marketing\Dashboard\DashboardController;

//Guest Route Group
Route::middleware(['guest:marketing'])->group(function () {
    // Marketing Auth Route
    Route::get('/', function () {
        return redirect()->route('marketing.login');
    });
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/authenticate', 'authenticate')->name('authenticate');
        Route::get('/forgot-password', 'forgot_password')->name('forgot_password');
    });
});

//Authenticated Marketing Route
Route::middleware(['marketing:marketing'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
