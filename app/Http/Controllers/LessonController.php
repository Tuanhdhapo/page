<?php

namespace App\Http\Controllers;

    use App\Models\Course;
    use App\Models\Feedback;
    use App\Models\Lesson;
    use App\Models\UserCourse;
    use Illuminate\Http\Request;
    use App\Models\Document;
    use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class LessonController extends Controller
{
    public function show(Course $course,Lesson $lesson)
    {
        return view('lessons.index',compact('course','lesson'));
    }

    public function join(Lesson $lesson,Course $course)
    {
        $lesson->users()->attach(Auth::user());
    //    return redirect()->route('course.lessons.show',  [$course,$lesson]);
       return view('home');
    }
}
