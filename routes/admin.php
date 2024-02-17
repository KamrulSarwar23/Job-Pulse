<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\AllCompanyController;
use App\Http\Controllers\Backend\JobRequestController;

// Admin profile Routes

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('/profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');

// Silder Routes
Route::put('slider-change-status', [SliderController::class, 'changeStatus'])->name('slider.change-status');
Route::resource('slider', SliderController::class);

// Silder Routes
Route::put('category-change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource('category', CategoryController::class);

// All Company
Route::put('company-change-status', [AllCompanyController::class, 'changeStatus'])->name('company.change-status');
Route::resource('company', AllCompanyController::class);

// Job Request
Route::put('job-request-change-status', [JobRequestController::class, 'changeStatus'])->name('job-request.change-status');
Route::get('company-job-request', [JobRequestController::class, 'index'])->name('company.job-request');

// Blog Routes
Route::put('blog-change-status', [BlogController::class, 'changeStatus'])->name('blog.change-status');
Route::resource('blog', BlogController::class);



