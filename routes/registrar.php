<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\API\SubjectController;
use App\Http\Controllers\API\TrackController;
use App\Http\Controllers\API\SectionController;

Route::prefix('api')->group(function () {
    Route::get('subjects/search', [SubjectController::class, 'search'])->name('subjects.search');
    Route::get('tracks/search', [TrackController::class, 'search'])->name('tracks.search');
    Route::get('tracks/all', [TrackController::class, 'getTracksNoPagination'])->name('tracks.no_pagination');
    Route::get('sections/search', [SectionController::class, 'search'])->name('sections.search');

    Route::apiResource('subjects', SubjectController::class); 
    Route::apiResource('tracks', TrackController::class);
    Route::apiResource('sections', SectionController::class);
});

Route::get('/', function () {
    return redirect()->route('registrar.home');
});
Route::get('home', [HomeController::class, 'registrar'])->name('home');
Route::get('/{any}', [HomeController::class, 'registrar'])->where('any', '.*');