<?php

use App\Http\Controllers\Backend\Admin\Auth\AuthController;
use App\Http\Controllers\Backend\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Backend\Admin\Profile\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

//Guest Route Group
Route::middleware(['guest:admin'])->group(function () {
    // Admin Auth Route
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/authenticate', 'authenticate')->name('authenticate');
        Route::get('/forgot-password', 'forgot_password')->name('forgot_password');
    });
});

//Authenticated Admin Route
Route::middleware(['admin:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    //Course Controller
    Route::prefix('course')->controller(CourseController::class)->name('course.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('delete');
    });
    //Teacher Controller
    Route::prefix('teacher')->controller(TeacherController::class)->name('teacher.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('delete');
    });
    //Teacher Controller
    Route::prefix('student')->controller(StudentController::class)->name('student.')->group(function () {
        Route::get('/list', 'studentList')->name('studentList');
    });
});
