<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Tag;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        $mentors = User::where('role', User::ROLE['mentor'])->get();
        $tags = Tag::all();
        $courses = Course::filter($data)->paginate(config('constants.pagination'));
        return view('courses.index', compact('courses', 'mentors', 'tags'));
    }
 
    public function show(Course $course)
    {
        $lessons = $course->lessons()->paginate(config('constants.pagination'));
        return view('courses.show', compact('course', 'lessons'));
    }
}
