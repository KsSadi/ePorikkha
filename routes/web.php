<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','role:admin'])->name('dashboard');



Route::middleware('auth')->group(function () {


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'adminIndex'])->name('admin.dashboard');


    //Manage Exam
    Route::get('exam/manage', [ExamController::class, 'manageExam'])->name('admin.manage.exam');
    Route::get('exam/create', [ExamController::class, 'createExam'])->name('admin.exam.create');

    //Manage Student
    Route::get('student/manage', [StudentController::class, 'manageStudent'])->name('admin.manage.student');

});

//Student Dashboard
Route::group(['middleware' => ['auth','role:user']], function () {
    Route::get('dashboard', [DashboardController::class, 'studentIndex'])->name('user.dashboard');


});



require __DIR__.'/auth.php';
