<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\HomeController;

require __DIR__ . '/auth.php';


// User Dashboard Routes Group
Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'candidate', 'as' => 'candidate.'], function () {

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

});

// Home Page Route
Route::get('/', [HomeController::class, 'index'])->name('home.page');

// Admin Login Route
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');

// About Page Route
Route::get('/about/page', [HomeController::class, 'aboutPage'])->name('about.page');

// Jobs Page Route
Route::get('/job/page', [HomeController::class, 'jobPage'])->name('job.page');

// Blog Page Route
Route::get('/blog/page', [HomeController::class, 'blogPage'])->name('blog.page');

// Contact Page Route
Route::get('/contact/page', [HomeController::class, 'contactPage'])->name('contact.page');




