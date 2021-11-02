<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Tag;
use App\Models\Document;
use App\Models\Feedback;
use App\Models\Lesson;
use App\Models\ReplyReview;
use App\Models\UserCourse;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\Count;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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

 
    public function show(Request $request, Course $course)
    {
        $lessons = Course::inforLessons($course)->paginate(config('constants.pagination_lessons'));
        $totalDocuments = Lesson::documentsOfLesson($lessons->first())->get();
        
        if (Auth::check()) {
            $documentsLearned = Document::documentLearned($lessons->first())->get();
        } else {
            $documentsLearned = 0;
        }

        if (Auth::check() && $documentsLearned->count() != 0 && $totalDocuments->count() != 0) {
            $learnedPart = $documentsLearned->count() / $totalDocuments->count();
        } else {
            $learnedPart = 0;
        }

        return view('courses.course_detail', compact('course', 'lessons', 'learnedPart', 'totalDocuments'));
    }

    public function join($id)
    {
        $course = Course::find($id);
        $course->users()->attach(Auth::user()->id);

        return back();
    }

    public function leave($id)
    {
        $course = Course::find($id);
        $course->users()->detach(Auth::user()->id);

        return redirect()->route('courses');
    }
}
