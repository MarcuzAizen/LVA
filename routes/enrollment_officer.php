<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\AcadYearController;
use App\Http\Controllers\API\SectionController;
use App\Http\Controllers\API\StudentRemarkController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\EnrollController;

Route::prefix('api')->group(function() {
    Route::get('students/search', [StudentController::class, 'search'])->name('students.search');
    Route::post('students/check-lrn', [StudentController::class, 'checkLrn'])->name('students.checkLrn');
    Route::post('students/{student}/add-guardian', [StudentController::class, 'addGuardian'])->name('students.add_guardian');
    Route::delete('students/{student}/remove-guardian/{guardian}', [StudentController::class, 'removeGuardian'])->name('students.remove_guardian');
    Route::get('acad-years/all', [AcadYearController::class, 'getAllAcadYears'])->name('acad_years.all');
    Route::get('sections/all', [SectionController::class, 'getAllSections'])->name('sections.all');
    Route::get('user', [UserController::class, 'getCurrentUser'])->name('current_user');

    Route::apiResource('students', StudentController::class);
    Route::apiResource('enrolls', EnrollController::class);
    Route::apiResource('student-remarks', StudentRemarkController::class);
});

Route::get('/', function () {
    return redirect()->route('enrollment_officer.home');
});
Route::get('home', [HomeController::class, 'enrollmentOfficer'])->name('home');
Route::get('/{any}', [HomeController::class, 'enrollmentOfficer'])->where('any', '.*');