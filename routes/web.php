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
use App\Http\Controllers\CourseUserController;

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

Route::middleware(['auth'])->group(function () {
    Route::resource('user', UserController::class)->only(['show', 'update']);
    Route::resource('course-users', CourseUserController::class)->only(['store', 'destroy']);
    Route::resource('course.lessons', LessonController::class)->only(['show']);
    Route::resource('/reviews', ReviewController::class)->only(['store']);
    Route::resource('/documents', DocumentController::class)->only(['show']);
});

Auth::routes();
