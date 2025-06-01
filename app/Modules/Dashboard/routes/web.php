<?php

use App\Modules\Dashboard\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'adminIndex'])->name('dashboard');
    Route::get('/stats', [DashboardController::class, 'stats'])->name('stats');
    // Add more admin dashboard routes here
});


Route::middleware(['auth'])->name('participant.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'participantIndex'])->name('dashboard');
    Route::get('/stats', [DashboardController::class, 'stats'])->name('stats');
    // Add more admin dashboard routes here
});
