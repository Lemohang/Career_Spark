<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('/email/verify', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/institutes', [AdminController::class, 'manageInstitutes'])->name('admin.manage_institutes');
    Route::post('/institutes', [AdminController::class, 'storeInstitute'])->name('admin.store_institute');
    Route::get('/institutes/edit/{id}', [AdminController::class, 'editInstitute'])->name('admin.edit_institute');
    Route::delete('/institutes/{id}', [AdminController::class, 'deleteInstitute'])->name('admin.delete_institute');
    // Routes for Institute Profile and Course Management
    Route::prefix('institute')->middleware(['auth', 'institute'])->group(function () {
    Route::get('/profile', [InstituteController::class, 'showProfile'])->name('institute.profile');
    Route::put('/profile', [InstituteController::class, 'updateProfile'])->name('institute.update_profile');

    Route::get('/courses', [CourseController::class, 'index'])->name('institute.manage_courses');
    Route::post('/courses', [CourseController::class, 'store'])->name('institute.store_course');
    Route::get('/courses/edit/{id}', [CourseController::class, 'edit'])->name('institute.edit_course');
    Route::put('/courses/{id}', [CourseController::class, 'update'])->name('institute.update_course');
    Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('institute.delete_course');

    // Routes for Student Dashboard and Application Process
    Route::prefix('student')->middleware(['auth', 'student'])->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/apply', [ApplicationController::class, 'create'])->name('student.apply');
    Route::post('/apply', [ApplicationController::class, 'store'])->name('student.submit_application');
});

});

});


Route::get('/', function () {
    return view('welcome');
});

