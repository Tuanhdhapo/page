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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Course $course)
    {
        
        $tags = Course::tagsCourse($course)->get();
        $otherCourses = Course::showOtherCourses($course)->get();
        $lessons = Course::inforLessons($course)->paginate(config('constants.pagination_lessons'));
        $isJoined = UserCourse::joined($course)->first() ? true : false;
        $totalRate  = Feedback::feedbacksOfCourse($course)->sum('rate');
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

        return view('courses.course_detail', compact('course', 'lessons', 'tags', 'otherCourses', 'isJoined', 'totalRate', 'learnedPart', 'totalDocuments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
