<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamAttemptController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:admin']], function () {
    Route::get('dashboard', [DashboardController::class, 'adminIndex'])->name('admin.dashboard');

    // Exam routes
    Route::get('exam/manage', [ExamController::class, 'manageExam'])->name('admin.manage.exam');
    Route::get('exam/create', [ExamController::class, 'createExam'])->name('admin.exam.create');
    Route::post('exam/store', [ExamController::class, 'store'])->name('admin.exam.store');
    Route::get('exam/show/{exam}', [ExamController::class, 'show'])->name('admin.exam.show');
    Route::put('/exams/{exam}', [ExamController::class, 'update'])->name('admin.exam.update');
    Route::put('/exams/published/{exam}', [ExamController::class, 'updatePublished'])->name('admin.exam.published');
    Route::get('exam/{exam}/edit', [ExamController::class, 'edit'])->name('admin.exam.edit');

    Route::delete('/manage/{id}', [ExamController::class, 'destroy'])->name('admin.exam.destroy');



    //Manage Student
    Route::get('student/manage', [StudentController::class, 'manageStudent'])->name('admin.manage.student');
    Route::get('student/create', [StudentController::class, 'createStudent'])->name('admin.student.create');

    Route::post('/student/store', [StudentController::class, 'store'])->name('admin.student.store');
    Route::get('/student/{user}', [StudentController::class, 'show'])->name('admin.student.show');
    Route::get('/student/{student}/edit', [StudentController::class, 'editStudent'])->name('admin.student.edit');
    Route::patch('/student/update/{student}', [StudentController::class, 'update'])->name('admin.student.update');
    Route::delete('/student/delete/{student}', [StudentController::class, 'destroy'])->name('admin.student.destroy');

    // Custom route for toggling user status
    Route::patch('/student/{user}/toggle-status', [StudentController::class, 'toggleStatus'])
        ->name('admin.student.toggle-status');


    // Report routes
    Route::get('report/manage', [ExamReportController::class, 'manageReport'])->name('admin.manage.report');
    Route::get('report/show/{exam}', [ExamReportController::class, 'showReport'])->name('exams.report');

    Route::get('/grading/attempt/{attempt}', [ExamReportController::class, 'showStudentAnswers'])
    ->name('grading.student');

    Route::post('grading/answer/{answer}', [ExamReportController::class, 'saveGrade'])->name('grading.save');});

//Student Dashboard
Route::group(['middleware' => ['auth','role:user']], function () {
    Route::get('dashboard', [DashboardController::class, 'studentIndex'])->name('user.dashboard');

});

// Student Exam Routes
Route::middleware(['auth'])->group(function () {


    // View a specific exam
    Route::get('/exam/{exam}', [ExamAttemptController::class, 'showExam'])
        ->name('student.exam');

    // Submit the exam password
    Route::post('/exam/{exam}/password', [ExamAttemptController::class, 'checkPassword'])
        ->name('student.exam.verify-password');

    // Start exam from dashboard
    Route::post('/exam/{exam}/start', [DashboardController::class, 'startExam'])
        ->name('student.exam.start');

    // Access a specific question in an exam
    Route::get('/exam/{exam}/question/{question}', [ExamAttemptController::class, 'showQuestion'])
        ->name('student.question');

    // Submit an answer for a question
    Route::post('/exam/{exam}/question/{question}/submit', [App\Http\Controllers\ExamAttemptController::class, 'submitAnswer'])
        ->name('student.question.submit');

    // Submit the entire exam
    Route::post('/exam/{exam}/submit', [App\Http\Controllers\ExamAttemptController::class, 'submitExam'])
        ->name('student.exam.submit');



    // Handle exam timeout
    Route::get('/exam/{exam}/timeout', [App\Http\Controllers\ExamAttemptController::class, 'handleTimeout'])
        ->name('student.exam.timeout');

    // View exam results
    Route::get('/exam-result/{attempt}', [App\Http\Controllers\ExamAttemptController::class, 'showResult'])
        ->name('student.exam.result');

    // Log proctoring violations
    Route::post('/exam-attempt/{attempt}/log-violation', [App\Http\Controllers\ExamAttemptController::class, 'logViolation'])
        ->name('student.exam.log-violation');

    // File upload
    Route::post('/exam/{exam}/question/{question}/upload', [App\Http\Controllers\ExamAttemptController::class, 'uploadFile'])
        ->name('student.question.upload');

    // Delete file
    Route::delete('/exam/{exam}/question/{question}/file/{upload}', [App\Http\Controllers\ExamAttemptController::class, 'deleteFile'])
        ->name('student.question.delete-file');

});




require __DIR__.'/auth.php';

