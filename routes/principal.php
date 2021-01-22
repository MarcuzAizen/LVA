<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\TrackController;
use App\Http\Controllers\API\SubjectController;
use App\Http\Controllers\API\ScheduleController;
use App\Http\Controllers\API\AcadYearController;

Route::prefix('api')->group(function() {
    Route::get('users/teachers', [UserController::class, 'getTeachers'])->name('users.teachers');
    Route::get('users/teachers/all', [UserController::class, 'getTeachersAll'])->name('users.teachers_all');
    Route::get('users/teachers/search', [UserController::class, 'searchTeachers'])->name('users.search_teachers');
    Route::get('subjects/search', [SubjectController::class, 'search'])->name('subjects.search');
    Route::get('tracks/subject-offerings', [TrackController::class, 'getSubjectOfferings'])->name('tracks.subject_offerings');
    Route::get('schedules/junior-high/{gradeLevel}', [ScheduleController::class, 'getJuniorHighSched'])->name('schedules.junior_high');
    Route::get('schedules/senior-high/{gradeLevel}', [ScheduleController::class, 'getSeniorHighSched'])->name('schedules.senior_high');
    Route::get('acad-years', [AcadYearController::class, 'getAllAcadYears'])->name('acad_years.all');
    Route::get('subjects/{track_name}/{grade_level}', [SubjectController::class, 'getGradeLevelSubjects'])->name('subjects');
    Route::post('tracks/{track}/add-subject-offerings', [TrackController::class, 'addSubjectOfferings'])->name('tracks.add_subject_offerings');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::apiResource('schedules', ScheduleController::class);
});

Route::get('/', function () {
    return redirect()->route('principal.home');
});
Route::get('home', [HomeController::class, 'principal'])->name('home');
Route::get('/{any}', [HomeController::class, 'principal'])->where('any', '.*');