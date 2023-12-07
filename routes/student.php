<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

//Guest Route Group
Route::middleware(['guest:student'])->group(function () {
    // student Auth Route
    Route::get('/', function () {
        return redirect()->route('student.login');
    });
    Route::controller(StudentController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::get('/register', 'register')->name('register');
        Route::post('/store', 'store')->name('store');
        Route::post('/authenticate', 'authenticate')->name('authenticate');
        Route::get('/forgot-password', 'forgot_password')->name('forgot_password');
    });
});

//Authenticated Admin Route
Route::middleware(['student:student'])->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
    Route::get('/logout', [StudentController::class, 'logout'])->name('logout');
});
