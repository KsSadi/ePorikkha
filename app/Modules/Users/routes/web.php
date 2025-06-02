<?php

use App\Modules\Users\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->prefix('admin/user')->name('admin.')->group(function () {
    Route::get('/overview', [UsersController::class, 'overview'])->name('user.overview.index');
//    Route::get('/stats', [UsersController::class, 'stats'])->name('stats');
    // Add more admin dashboard routes here
});


Route::prefix('admin')->middleware(['auth','role:admin'])->prefix('admin')->group(function () {
    Route::get('/users', [UsersController::class, 'overview'])->name('admin.users.index');
    Route::post('/users', [UsersController::class, 'store'])->name('admin.users.store');
    Route::put('/users/{user}', [UsersController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('admin.users.destroy');
    Route::post('/users/bulk-action', [UsersController::class, 'bulkAction'])->name('admin.users.bulk');
});

