<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\StudentRemarkController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\GuardianController;
use App\Http\Controllers\API\EnrollController;
use App\Http\Controllers\API\GradeController;
use App\Http\Controllers\API\AttendanceController;
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

Route::post('students/{student}/add-guardian', [StudentController::class, 'addGuardian'])->name('students.add_guardian');
Route::delete('students/{student}/remove-guardian/{guardian}', [StudentController::class, 'removeGuardian'])->name('students.remove_guardian');

Route::apiResource('roles', RoleController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('student-remarks', StudentRemarkController::class);
Route::apiResource('guardians', GuardianController::class);
Route::apiResource('enrolls', EnrollController::class);
Route::apiResource('grades', GradeController::class);
Route::apiResource('attendances', AttendanceController::class);