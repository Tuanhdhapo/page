<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('id')->paginate(config('constants.pagination'));
        $mentors = User::where('role', User::ROLE['mentor'])->get();
        $tags = Tag::all();
        return view('courses.index', compact('courses', 'mentors', 'tags'));
    }

    public function search(Request $request)
    {
        $data = $request->all();
        if (isset($data['search_form_input'])) {
            $keyword = $data['search_form_input'];
        } else {
            $keyword = '';
        }
        $mentors = User::where('role', User::ROLE['mentor'])->get();
        $tags = Tag::all();
        $courses = Course::filter($data)->paginate(config('constants.pagination'));
        return view('courses.index', compact('courses', 'mentors', 'tags', 'keyword'));
    }
}
