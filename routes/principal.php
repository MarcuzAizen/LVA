<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\TrackController;

Route::prefix('api')->group(function() {
    Route::get('users/teachers', [UserController::class, 'getTeachers'])->name('users.teachers');
    Route::get('users/teachers/search', [UserController::class, 'searchTeachers'])->name('users.search_teachers');
    Route::get('tracks/subject-offerings', [TrackController::class, 'getSubjectOfferings'])->name('tracks.subject_offerings');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::get('/', function () {
    return redirect()->route('principal.home');
});
Route::get('home', [HomeController::class, 'principal'])->name('home');
Route::get('/{any}', [HomeController::class, 'principal'])->where('any', '.*');