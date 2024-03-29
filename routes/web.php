<?php

use App\Http\Controllers\CodeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\RouterController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPermissionsController;
use App\Models\StudentCourse;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/about', function () {
    return view('about');
});
Route::get('/service', function () {
    return view('service');
});
Route::get('/project', function () {
    return view('project');
});
Route::get('/feature', function () {
    return view('feature');
});
Route::get('/team', function () {
    return view('team');
});
Route::get('/testimonial', function () {
    return view('testimonial');
});
Route::get('/quote', function () {
    return view('quote');
});
Route::get('/404', function () {
    return view('404');
});
Route::get('/contact', function () {
    return view('contact');
});


// General
Route::prefix('/')->group(function () {
    Route::get('/', [RouterController::class, 'index'])->name('home');
    Route::get('/login', [RouterController::class, 'login'])->name('login')->middleware('guest');
    Route::get('/signup', [RouterController::class, 'signup'])->name('signup')->middleware('guest');
    Route::get('/catalogue', [RouterController::class, 'catalogue']);
});


// User
Route::prefix('/user')->group(function () {
    // General
    Route::post('/auth', [UserController::class, 'authanticate']);
    Route::post('/store', [UserController::class, 'store'])->middleware('guest');
    Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
    // Route::get('/settings', [UserController::class, 'show'])->middleware('auth');

    // Admin
    Route::get('/students', [UserController::class, 'students'])->middleware('admin');
    Route::get('/instructors', [UserController::class, 'instructors'])->middleware('admin');
    Route::get('/admins', [UserController::class, 'admins'])->middleware('admin');
    Route::get('/add', [UserController::class, 'add'])->middleware('admin');
    Route::post('/storeadded', [UserController::class, 'storeAdded'])->middleware('admin');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->middleware('admin');
    Route::put('/update/{user}', [UserController::class, 'update'])->middleware('admin');
    Route::delete('/delete/{user}', [UserController::class, 'destroy'])->middleware('admin');
    Route::get('/tasks', [UserController::class, 'tasks'])->middleware('admin');

    // Student
    Route::get('/course', [UserController::class, 'course'])->middleware('auth');
});

// Instructor
Route::prefix('/instructor')->group(function () {
    Route::get('/course', [InstructorController::class, 'courses'])->middleware('instructor');
    Route::get('/course/students/{course}', [InstructorController::class, 'courseStudents'])->middleware('instructor');
    Route::get('/course/lecs/{course}', [InstructorController::class, 'courseLecs'])->middleware('instructor');
    Route::get('/course/lecs/{course}/{lecture}', [InstructorController::class, 'courseLecs'])->middleware('instructor');
    Route::get('/course/recs/{course}', [InstructorController::class, 'courseRecs'])->middleware('instructor');
    Route::get('/course/recs/{course}/{record}', [InstructorController::class, 'courseRecs'])->middleware('instructor');
});


// Task
Route::prefix('/task')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->middleware('admin');
    Route::get('/add', [TaskController::class, 'add'])->middleware('admin');
    Route::post('/store', [TaskController::class, 'store'])->middleware('admin');
    Route::post('/done/{userTask}', [TaskController::class, 'done'])->middleware('admin');
    Route::get('/edit/{task}', [TaskController::class, 'edit'])->middleware('admin');
    Route::put('/update/{task}', [TaskController::class, 'update'])->middleware('admin');
    Route::delete('/delete/{task}', [TaskController::class, 'destroy'])->middleware('admin');
});

// Admin Permissions
Route::prefix('/user/permissions')->group(function () {
    Route::get('/{user}', [UserPermissionsController::class, 'index'])->middleware('admin');
    Route::put('/update/{user}', [UserPermissionsController::class, 'update'])->middleware('admin');
});


// Course
Route::prefix('/course')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->middleware('admin');
    Route::get('/add', [CourseController::class, 'add'])->middleware('admin');
    Route::post('/store', [CourseController::class, 'store'])->middleware('admin');
    Route::get('/show/{course}', [CourseController::class, 'show']);
    Route::post('/enroll/{course}', [CourseController::class, 'enroll'])->middleware('auth');
    Route::get('/edit/{course}', [CourseController::class, 'edit'])->middleware('admin');
    Route::put('/update/{course}', [CourseController::class, 'update'])->middleware('admin');
    Route::delete('/delete/{course}', [CourseController::class, 'destroy'])->middleware('admin');
});

// Student Course
Route::prefix('/studentCourse')->group(function () {
    Route::get('/{studentCourse}', [StudentCourseController::class, 'index'])->middleware('auth');
    // Route::get('/add', [StudentCourseController::class, 'add'])->middleware('auth');
    // Route::post('/store', [StudentCourseController::class, 'store'])->middleware('auth');
    // Route::get('/show/{course}', [StudentCourseController::class, 'show']);
    // Route::post('/enroll/{course}', [StudentCourseController::class, 'enroll'])->middleware('auth');
    // Route::get('/edit/{course}', [StudentCourseController::class, 'edit'])->middleware('auth');
    // Route::put('/update/{course}', [StudentCourseController::class, 'update'])->middleware('auth');
    // Route::delete('/delete/{course}', [StudentCourseController::class, 'destroy'])->middleware('auth');
});

// Code
Route::prefix('/code')->group(function () {
    Route::get('/{course}', [CodeController::class, 'index'])->middleware('admin');
    Route::post('/generate/{course}', [CodeController::class, 'generate'])->middleware('admin');
    Route::delete('/delete/{code}', [CodeController::class, 'destroy'])->middleware('admin');
    Route::delete('/deleteAll/{course}', [CodeController::class, 'destroyAll'])->middleware('admin');
});

// Lecture
Route::prefix('/lecture')->group(function () {
    Route::post('/store/{course}', [LectureController::class, 'store'])->middleware('instructor');
    Route::put('/update/{lecture}', [LectureController::class, 'update'])->middleware('instructor');
    Route::delete('/delete/{lecture}', [LectureController::class, 'destroy'])->middleware('instructor');
});

// Record
Route::prefix('/record')->group(function () {
    Route::post('/store/{course}', [RecordController::class, 'store'])->middleware('instructor');
    Route::put('/update/{record}', [RecordController::class, 'update'])->middleware('instructor');
    Route::delete('/delete/{record}', [RecordController::class, 'destroy'])->middleware('instructor');
});


// Middlewares:
//  1. No middleware
//  2. guest
//  3. auth
//  3. instructor
//  4. admin
