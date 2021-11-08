<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CourseUserController extends Controller
{
    public function store(Request $request)
    {
        $course = Course::findOrFail($request['course_id']);
        if (!empty($course->isJoined)) {
            return back();
        } else {
            $course->users()->sync([Auth::id() ?? null]);
            return back();
        }
    }

    public function destroy($courseId)
    {
        $course = Course::findOrFail($courseId);
        $course->users()->detach(Auth::id());
       return redirect()->route('courses.show', $course);
    }
}
