<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;


Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/signup', [AuthController::class, 'register'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('registration.post');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::post('/logout', function () { Auth::logout(); request()->session()->invalidate(); request()->session()->regenerateToken(); return redirect('/'); })->name('logout');

Route::group(['middleware' => 'auth'], function () {
    //LECTURER SIDE
Route::get('/dashboard', [LecturerController::class, 'dashboard']);
Route::post('/update-profile', [LecturerController::class, 'updateProfile']);
Route::get('/take-course/assign', [LecturerController::class, 'registerCourse']);
Route::post('/add-course', [LecturerController::class, 'addCourse']);
Route::get('/take-course/manage', [LecturerController::class, 'manageCourse']);
Route::delete('/delete-teach/{teach}', [LecturerController::class, 'deleteTeach'])->name('delete-teach');
Route::get('/assignment/assign', [LecturerController::class, 'assignAssignment']);
Route::post('/add-assignment', [LecturerController::class, 'addAssignment'])->name('register-assignment');
Route::get('/assignment/manage', [LecturerController::class, 'manageAssignment']);
Route::post('/toggle-assignment-status/{id}', [LecturerController::class, 'toggleAssignmentStatus'])->name('toggle-assignment-status');
Route::delete('/delete-assignment/{id}', [LecturerController::class, 'deleteAssignment'])->name('delete-assignment');
Route::get('/take-course/manage/details/{id}', [LecturerController::class, 'manageDetailAssignment'])->name('assignment-details');;
Route::put('/give-marks/{id}', [LecturerController::class, 'giveMarks'])->name('give-marks');
Route::get('/quiz/assign', [LecturerController::class, 'assignQuiz']);
Route::get('/quiz/manage', [LecturerController::class, 'manageQuiz']);


//STUDENT SIDE
Route::get('/student-dashboard', [StudentController::class, 'dashboard']);
Route::post('/student-update-profile', [StudentController::class, 'updateProfile']);
Route::get('/student-take-course/register', [StudentController::class, 'registerCourse']);
Route::post('/student-add-course', [StudentController::class, 'addCourse'])->name('student-add-course');
Route::delete('/delete-learn/{learn}', [StudentController::class, 'deleteLearn'])->name('delete-learn');
Route::get('/student-take-course/manage', [StudentController::class, 'manageCourse']);
Route::get('/student-assignment/details', [StudentController::class, 'assignmentDetails']);
Route::post('/submit-assignment', [StudentController::class, 'submitAssignment'])->name('submit-assignment');
Route::get('/student-assignment/result', [StudentController::class, 'assignmentResults']);

});