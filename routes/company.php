<?php

use App\Http\Controllers\Backend\CompanyController;
use Illuminate\Support\Facades\Route;

// Vendor Profile Routes
Route::get('/dashboard', [CompanyController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [CompanyController::class, 'index'])->name('profile');
Route::put('profile', [CompanyController::class, 'updateProfile'])->name('profile.update');
Route::post('profile', [CompanyController::class, 'updatePassword'])->name('profile.update.password');

