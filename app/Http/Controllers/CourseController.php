<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\UserCourse;

class CourseController extends Controller
{
    public function course(){
        $courses = Course::orderBy('id')->paginate(config('constants.pagination'));
        $mentor = User::where('role', User::ROLE['mentor'])->get();
        $tags = Tag::all();
        return view('course.index', compact('courses', 'mentor', 'tags'));
    }

     public function courseSearch(Request $request)
    {
        $data = $request->all();
        if (isset($data['search_form_input'])) {
            $keyword = $data['search_form_input'];
        } else {
            $keyword = '';
        }
        $mentor = User::where('role', User::ROLE['mentor'])->get();
        $tags = Tag::all();
        $courses = Course::filter($data)->paginate(config('constants.pagination'));
        return view('course.index', compact('courses', 'mentor', 'tags', 'keyword'));
    }

    public function detail($id)
    {
        $course = Course::find($id);
        $otherCourses = Course::showOtherCourses($course->id)->get();  
        $teachers = Course::TeacherOfCourse($id)->get();
        $lessons = Course::inforLessons($id)->paginate(config('constants.pagination_lessons'));
        //$isJoined = UserCourse::joined($id)->first() ? true : false;
        $tags = Course::tagsCourse($id)->get();
        return view('course.course-detail', compact('course', 'lessons', 'tags', 'otherCourses', 'teachers'));
        
    }
}
