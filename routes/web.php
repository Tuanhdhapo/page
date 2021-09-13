<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CourseDetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;


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


Route::get('/',[HomeController::class,'index']);
Route::get('allcourse',[CourseController::class,'course']);
Route::get('search', [CourseController::class, 'courseSearch'])->name('search');
Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('courses/detail/{id}', [CourseController::class, 'detail'])->name('courses.detail');
Route::get('lesson/detail/{id}', [LessonController::class, 'detail'])->name('lesson.detail');
Route::get('lesson/teacher/{id}', [LessonController::class, 'teacher'])->name('lesson.teacher');
Route::get('lesson/program/{id}', [LessonController::class, 'program'])->name('lesson.program');
Route::get('lesson/review/{id}', [LessonController::class, 'review'])->name('lesson.review');
// Route::get('profile/profile/{id}', [ProfileController::class, 'profile'])->name('profile.profile');

Route::get('profile', function () {
    return view('profile.profile');
});
Auth::routes();
