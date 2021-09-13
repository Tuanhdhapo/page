<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Tag;
use App\Models\Lesson;
use App\Models\UserCourse;


use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function detail($id)
    {  
        $course = Course::find($id);
        $otherCourses = Course::showOtherCourses($course->id)->get();  
        $lesson = Lesson::findOrFail($id);
        $tags = Course::tagsCourse($id)->get();
      
        // $progressOfLesson = $lesson->learning_progress;
        return view('lesson.lesson-detail', compact('lesson','course','otherCourses','tags' ));
    }

     public function teacher($id)
    {  
        $course = Course::find($id);
        $otherCourses = Course::showOtherCourses($course->id)->get();  
        $lesson = Lesson::findOrFail($id);
        $tags = Course::tagsCourse($id)->get();
        $mentor = User::find($id);
     
        // $progressOfLesson = $lesson->learning_progress;
        return view('lesson.lesson-teacher', compact('lesson','course','otherCourses','tags','mentor' ));
    }

     public function program($id)
    {  
        $course = Course::find($id);
        $otherCourses = Course::showOtherCourses($course->id)->get();  
        $lesson = Lesson::findOrFail($id);
        $tags = Course::tagsCourse($id)->get();
        $mentor = User::find($id);
     
        // $progressOfLesson = $lesson->learning_progress;
        return view('lesson.lesson-program', compact('lesson','course','otherCourses','tags','mentor' ));
    }

     public function review($id)
    {  
        $course = Course::find($id);
        $otherCourses = Course::showOtherCourses($course->id)->get();  
        $lesson = Lesson::findOrFail($id);
        $tags = Course::tagsCourse($id)->get();
        $mentor = User::find($id);
     
        // $progressOfLesson = $lesson->learning_progress;
        return view('lesson.lesson-review', compact('lesson','course','otherCourses','tags','mentor' ));
    }
} 
