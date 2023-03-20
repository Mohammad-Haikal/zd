<?php

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
});


// User
Route::prefix('/user')->group(function () {
    Route::post('/auth', [UserController::class, 'authanticate']);
    // Route::get('/', [UserController::class, 'index'])->middleware('auth');
    // Route::get('/add', [UserController::class, 'create'])->middleware('auth');
    Route::post('/store', [UserController::class, 'store'])->middleware('guest');
    // Route::get('/edit/{user}', [UserController::class, 'edit'])->middleware('auth');
    // Route::put('/update/{user}', [UserController::class, 'update'])->middleware('auth');
    // Route::get('/settings', [UserController::class, 'show'])->middleware('auth');
    // Route::put('/update-info/{user}', [UserController::class, 'updateInfo'])->middleware('auth');
    // Route::put('/update-pass/{user}', [UserController::class, 'updatePass'])->middleware('auth');
    Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
    // Route::delete('/delete/{user}', [UserController::class, 'destroy'])->middleware('auth');

    Route::get('/instructors', [UserController::class, 'instructors'])->middleware('admin');
    Route::get('/students', [UserController::class, 'students'])->middleware('admin');
});


// Course
Route::prefix('/course')->group(function () {
    Route::get('/', [CourseController::class, 'index']);
    // Route::get('/create', [CourseController::class, 'create'])->middleware('auth');
    // Route::post('/store', [CourseController::class, 'store'])->middleware('auth');
    // Route::get('/show/{course}', [CourseController::class, 'show'])->middleware('auth');
    // Route::get('/edit/{course}', [CourseController::class, 'edit'])->middleware('auth');
    // Route::put('/update', [CourseController::class, 'update'])->middleware('auth');
    // Route::delete('/destroy/{course}', [CourseController::class, 'destroy'])->middleware('auth');
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
