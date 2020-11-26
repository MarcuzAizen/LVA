<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\HomeController;

Route::get('/', function () {
    return redirect()->route('teacher.home');
});
Route::get('home', [HomeController::class, 'teacher'])->name('home');
Route::get('/{any}', [HomeController::class, 'teacher'])->where('any', '.*');