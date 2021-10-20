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
Route::get('courses', [CourseController::class, 'index'])->name('courses');
Route::get('courses/search', [CourseController::class, 'search'])->name('courses/search');
Route::get('courses/detail/{id}', [CourseController::class, 'detail'])->name('courses.detail');
Route::get('insert/{id}', [CourseController::class, 'join'])->middleware('login')->name('insert');
Route::get('courses/detail/{id}/search', [LessonController::class, 'search'])->middleware('login')->name('filterdetail');
Route::get('courses/detail/lesson/{id}', [LessonController::class, 'index'])->middleware('login')->name('courses/search/lesson');
Route::post('/addreview', [ReviewController::class, 'add'])->middleware('login')->name('course.feedback');
Route::get('/view/{file}', [DocumentController::class, 'show']);

Route::get('/profile', [UserController::class, 'index'])->middleware('login')->name('profile');
Route::post('/profile/edit', [UserController::class, 'update'])->middleware('login');

Auth::routes();
