<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\HomeController;

Route::get('/', function () {
    return redirect()->route('enrollment_officer.home');
});
Route::get('home', [HomeController::class, 'enrollmentOfficer'])->name('home');