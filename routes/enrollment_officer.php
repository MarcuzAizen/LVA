<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\API\StudentController;

Route::prefix('api')->group(function() {
    Route::get('students/search', [StudentController::class, 'search'])->name('students.search');

    Route::apiResource('students', StudentController::class);
});

Route::get('/', function () {
    return redirect()->route('enrollment_officer.home');
});
Route::get('home', [HomeController::class, 'enrollmentOfficer'])->name('home');
Route::get('/{any}', [HomeController::class, 'enrollmentOfficer'])->where('any', '.*');