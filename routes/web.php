<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'adminIndex'])->name('admin.dashboard');


    // Exam routes
    Route::get('exam/manage', [ExamController::class, 'manageExam'])->name('admin.manage.exam');
    Route::get('exam/create', [ExamController::class, 'createExam'])->name('admin.exam.create');
    Route::post('exam/store', [ExamController::class, 'store'])->name('admin.exam.store');
    Route::get('exam/{exam}', [ExamController::class, 'show'])->name('admin.exam.show');
    Route::get('exam/{exam}/edit', [ExamController::class, 'edit'])->name('admin.exam.edit');
    Route::post('exam/preview', [ExamController::class, 'preview'])->name('admin.exam.preview');



    //Manage Student
    Route::get('student/manage', [StudentController::class, 'manageStudent'])->name('admin.manage.student');
    Route::get('student/create', [StudentController::class, 'createStudent'])->name('admin.student.create');

});

//Student Dashboard
Route::group(['middleware' => ['auth','role:user']], function () {
    Route::get('dashboard', [DashboardController::class, 'studentIndex'])->name('user.dashboard');

});



require __DIR__.'/auth.php';
