<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Feedback;
use App\Models\Lesson;
use App\Models\ReplyReview;   
use App\Models\UserCourse;
use Illuminate\Support\Facades\Auth;

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

      public function detail($id)
    {
        $course = Course::find($id);
        $tags = Course::tagsCourse($id)->get();
        $otherCourses = Course::showOtherCourses($course->id)->get();
        $mentors = Course::mentorOfCourse($id)->get();
        $lessons = Course::inforLessons($id)->paginate(config('constants.pagination_lessons'));
        $isJoined = UserCourse::joined($id)->first() ? true : false;
        $reviews  = Feedback::feedbacksOfCourse($course->id)->get();
        // dd($reviews);
        $totalRate  = Feedback::feedbacksOfCourse($course->id)->sum('rate');
        $avgRating = $reviews->count() > 0 ? round($totalRate / $reviews->count()) : 0;
        $totalDocuments = Lesson::documentsOfLesson($lessons->first()->id)->get()  ;

        if (Auth::check()) {
            $documentsLearned = Document::documentLearned($lessons->first()->id)->get();
        } else {
            $documentsLearned = 0;
        }

        if (Auth::check() && $documentsLearned->count() != 0 && $totalDocuments->count() != 0) {
            $learnedPart = $documentsLearned->count() / $totalDocuments->count();
        } else {
            $learnedPart = 0;
        }

       

        return view('courses.course_detail', compact('course', 'lessons', 'tags', 'otherCourses', 'mentors','isJoined','reviews','totalRate','learnedPart','avgRating','totalDocuments'));
    }

     public function join($id)
    {
        $course = Course::find($id);
        $course->users()->attach(Auth::user()->id);

        return redirect()->route('courses.detail', [$id]);
    }

    public function leave($id)
    {
        $course = Course::find($id);
        $course->users()->detach(Auth::user()->id);

        return redirect()->route('courses');
    }
}
