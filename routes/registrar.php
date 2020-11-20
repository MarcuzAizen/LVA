<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\HomeController;

Route::get('/', function () {
    return redirect()->route('registrar.home');
});
Route::get('home', [HomeController::class, 'registrar'])->name('home');