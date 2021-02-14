<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\AcadYearController;
use App\Http\Controllers\API\SectionController;
use App\Http\Controllers\API\StudentRemarkController;
use App\Http\Controllers\API\UserController;

Route::prefix('api')->group(function() {
    Route::get('students/search', [StudentController::class, 'search'])->name('students.search');
    Route::get('acad-years/all', [AcadYearController::class, 'getAllAcadYears'])->name('acad_years.all');
    Route::get('sections/all', [SectionController::class, 'getAllSections'])->name('sections.all');
    Route::get('student-remarks', [StudentRemarkController::class, 'index'])->name('student_remarks.index');
    Route::get('user', [UserController::class, 'getCurrentUser'])->name('current_user');

    Route::apiResource('students', StudentController::class);
});

Route::get('/', function () {
    return redirect()->route('enrollment_officer.home');
});
Route::get('home', [HomeController::class, 'enrollmentOfficer'])->name('home');
Route::get('/{any}', [HomeController::class, 'enrollmentOfficer'])->where('any', '.*');