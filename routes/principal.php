<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\HomeController;

// TODO: add api routes for principal here

Route::get('/', function () {
    return redirect()->route('principal.home');
});
Route::get('home', [HomeController::class, 'principal'])->name('home');
Route::get('/{any}', [HomeController::class, 'principal'])->where('any', '.*');