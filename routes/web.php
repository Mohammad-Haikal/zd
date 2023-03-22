<?php

use App\Http\Controllers\CodeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\RouterController;
use App\Http\Controllers\UserController;
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
    Route::get('/instructors', [UserController::class, 'instructors'])->middleware('admin');
    Route::get('/students', [UserController::class, 'students'])->middleware('admin');
    Route::get('/add', [UserController::class, 'add'])->middleware('admin');
    Route::post('/storeadded', [UserController::class, 'storeAdded'])->middleware('admin');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->middleware('admin');
    Route::put('/update/{user}', [UserController::class, 'update'])->middleware('admin');
    Route::delete('/delete/{user}', [UserController::class, 'destroy'])->middleware('admin');

    // Student
    Route::get('/course', [UserController::class, 'course'])->middleware('auth');

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

// Code
Route::prefix('/code')->group(function () {
    Route::get('/{course}', [CodeController::class, 'index'])->middleware('admin');
    Route::post('/generate/{course}', [CodeController::class, 'generate'])->middleware('admin');
    // Route::get('/show/{course}', [CodeController::class, 'show']);
    // Route::get('/edit/{course}', [CodeController::class, 'edit'])->middleware('admin');
    // Route::put('/update/{course}', [CodeController::class, 'update'])->middleware('admin');
    // Route::delete('/delete/{course}', [CodeController::class, 'destroy'])->middleware('admin');
});

// Lecture
Route::prefix('/lecture')->group(function () {
    // Route::get('/', [LectureController::class, 'index'])->middleware('auth');
    // Route::get('/create', [LectureController::class, 'create'])->middleware('auth');
    // Route::post('/store', [LectureController::class, 'store'])->middleware('auth');
    // Route::get('/show/{lecture}', [LectureController::class, 'show'])->middleware('auth');
    // Route::get('/edit/{lecture}', [LectureController::class, 'edit'])->middleware('auth');
    // Route::put('/update', [LectureController::class, 'update'])->middleware('auth');
    // Route::delete('/destroy/{lecture}', [LectureController::class, 'destroy'])->middleware('auth');
});






// Middlewares:
//  1. No middleware
//  2. guest
//  3. auth
//  3. instructor
//  4. admin
