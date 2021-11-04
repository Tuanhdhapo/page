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
        $totalUsers = User::where('role', config('constants.role.student'))->count();
        $totalCourses = Course::count();
        $totalLessons = Lesson::count();
        $courses = Course::HomeOtherCourse()->get();
        $otherCourses = Course::HomeOtherCOurse()->get();

        return view('home', compact('courses', 'otherCourses', 'totalUsers', 'totalCourses', 'totalLessons'));
    }
}
