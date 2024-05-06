<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;

//LECTURER SIDE
Route::get('/login', [LecturerController::class, 'login']);
Route::get('/signup', [LecturerController::class, 'signup']);
Route::get('/dashboard', [LecturerController::class, 'dashboard']);
Route::get('/take-course/assign', [LecturerController::class, 'registerCourse']);
Route::get('/take-course/manage', [LecturerController::class, 'manageCourse']);
Route::get('/assignment/assign', [LecturerController::class, 'assignAssignment']);
Route::get('/assignment/manage', [LecturerController::class, 'manageAssignment']);
Route::get('/take-course/manage/details', [LecturerController::class, 'manageDetailAssignment']);
Route::get('/quiz/assign', [LecturerController::class, 'assignQuiz']);
Route::get('/quiz/manage', [LecturerController::class, 'manageQuiz']);


//STUDENT SIDE
Route::get('/student-login', [StudentController::class, 'login']);
Route::get('/student-signup', [StudentController::class, 'signup']);
Route::get('/student-dashboard', [StudentController::class, 'dashboard']);
Route::get('/student-take-course/register', [StudentController::class, 'registerCourse']);
Route::get('/student-take-course/manage', [StudentController::class, 'manageCourse']);
Route::get('/student-assignment/details', [StudentController::class, 'assignmentDetails']);
Route::get('/student-assignment/result', [StudentController::class, 'assignmentResults']);