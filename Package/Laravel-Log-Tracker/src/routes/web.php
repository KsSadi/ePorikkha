<?php

use Illuminate\Support\Facades\Route;

use Kssadi\LogTracker\Http\Controllers\LogTrackerController;


Route::group([
    'prefix' => config('log-tracker.route_prefix', 'log-tracker'),
    'middleware' => config('log-tracker.middleware', ['web', 'auth']),
    'as' => 'log-tracker.',
], function () {
    Route::get('/', [LogTrackerController::class, 'dashboard'])->name('dashboard');
    Route::get('/log-file', [LogTrackerController::class, 'index'])->name('index');
    Route::get('/download/{logName}', [LogTrackerController::class, 'download'])->name('download');
    Route::post('/delete/{logName}', [LogTrackerController::class, 'delete'])->name('delete');

    // NEW EXPORT ROUTES
    Route::get('/export', [LogTrackerController::class, 'exportForm'])->name('export.form');
    Route::post('/export', [LogTrackerController::class, 'export'])->name('export');
    Route::get('/export/{logName}/{format}', [LogTrackerController::class, 'quickExport'])->name('export.quick');

    // Keep this last
    Route::get('/{logName}', [LogTrackerController::class, 'show'])->name('show');
});

