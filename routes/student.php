<?php

use App\Http\Controllers\Auth\Student\HomeController;
use App\Http\Controllers\Auth\Student\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('dashboard');

// Login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

