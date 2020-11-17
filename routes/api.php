<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\StudentRemarkController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\GuardianController;
use App\Http\Controllers\API\AcadYearController;
use App\Http\Controllers\API\SubjectController;
use App\Http\Controllers\API\TrackController;
use App\Http\Controllers\API\SectionController;
use App\Http\Controllers\API\ProspectusController;
use App\Http\Controllers\API\EnrollController;
use App\Http\Controllers\API\ScheduleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users/teachers', [UserController::class, 'getTeachers'])->name('users.teachers');
Route::get('users/teachers/search', [UserController::class, 'searchTeachers'])->name('users.search_teachers');

Route::post('students/{student}/add-guardian', [StudentController::class, 'addGuardian'])->name('students.add_guardian');
Route::delete('students/{student}/remove-guardian/{guardian}', [StudentController::class, 'removeGuardian'])->name('students.remove_guardian');
Route::post('tracks/{track}/add-subject-offerings', [TrackController::class, 'addSubjectOfferings'])->name('tracks.add_subject_offerings');

Route::apiResource('roles', RoleController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('student-remarks', StudentRemarkController::class);
Route::apiResource('students', StudentController::class);
Route::apiResource('guardians', GuardianController::class);
Route::apiResource('acad-years', AcadYearController::class);
Route::apiResource('subjects', SubjectController::class);
Route::apiResource('tracks', TrackController::class);
Route::apiResource('sections', SectionController::class);
Route::apiResource('prospectuses', ProspectusController::class);
Route::apiResource('enrolls', EnrollController::class);
Route::apiResource('schedules', ScheduleController::class); 