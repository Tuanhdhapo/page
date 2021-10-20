<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::orderByDesc('id')->limit(3)->get();
        $otherCourses = Course::orderBy('id')->limit(3)->get();
        $totalUsers = User::all()->count();
        $totalCourses = Course::all()->count();
        $totalLessons = Lesson::all()->count();

        return view('home', compact('courses', 'otherCourses', 'totalUsers', 'totalCourses', 'totalLessons'));
    }
}
