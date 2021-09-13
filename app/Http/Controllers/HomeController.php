<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\UserCourse;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->  except('index');

      

    }

    /**
     * Show the application dashboard
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        $mainCourses = Course::query()->mainCourse()->get();
        $otherCourses = Course::query()->otherCourse()->get(); 
        return view('home',compact('mainCourses','otherCourses'));
    }
}
