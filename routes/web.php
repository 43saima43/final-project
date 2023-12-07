<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Termwind\Components\Hr;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/courses', [HomeController::class, 'courses'])->name('courses');
Route::get('/teachers', [HomeController::class, 'teachers'])->name('teachers');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/about', [HomeController::class, 'about'])->name('about');
