<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\HomeController;

Route::get('/', function () {
    return redirect()->route('principal.home');
});
Route::get('home', [HomeController::class, 'principal'])->name('home');