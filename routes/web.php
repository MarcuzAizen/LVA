<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Employee\LoginController;

Route::get('/', function () {
    // return view('welcome');
    // return redirect()->route('employee.showLoginForm');
    return redirect()->route('admin.home');
});

Route::get('/login', function() {
    return view('auth.employee-login');
})->name('employee.showLoginForm');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');