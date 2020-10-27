<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\UserController;

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

Route::apiResource('roles', RoleController::class);
Route::apiResource('users', UserController::class);