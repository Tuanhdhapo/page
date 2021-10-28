<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('logout', [LogoutController::class, 'logout'])->name('logout');

Route::resource('courses', CourseController::class)->only(['index','show']);
Route::resource('courses.lessons', LessonController::class)->only(['show']);
Route::middleware(['auth'])->group(function () {
    Route::get('courses/{course}/join', [CourseController::class, 'join'])->name('courses.join');
    Route::post('/course/review', [ReviewController::class, 'add'])->name('course.review');
    Route::get('/view/{file}', [DocumentController::class, 'show']);
    Route::resource('user', UserController::class)->only(['index', 'update']);
});

Auth::routes();
