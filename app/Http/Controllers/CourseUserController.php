<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseUserController extends Controller
{
    public function store(Request $request)
    {
        $course = Course::findOrFail($request['course_id']);
        if (empty($course->checkjoinedcourse)) {
            $course->users()->sync([Auth::id() ?? null]);
            return back()->with('success', 'Successfully join this course!');
        } else {
            return back()->with('error', 'You have already joined the course');
        }
    }

    public function destroy($courseId)
    {
        $course = Course::findOrFail($courseId);
        if (empty($course->checkjoinedcourse)) {
            return back()->with('error', 'You have not taken this course');
        } else {
            $course->users()->detach(Auth::id());
            return redirect()->route('courses.show', $course)->with('success', 'Successfully leave this course!');
        }
    }
}
