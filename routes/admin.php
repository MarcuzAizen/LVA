<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\HomeController;

Route::get('/', function () {
    return redirect()->route('admin.home');
});
Route::get('home', [HomeController::class, 'admin'])->name('home');