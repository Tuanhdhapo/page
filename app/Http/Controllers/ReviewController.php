<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function add(Request $request)
    {
        $review = new Feedback();
        $review['user_id'] = Auth::user()->id;
        $review['course_id'] = $request->courseId;
        $review['lesson_id'] = $request->lessonId;
        $review['content'] = $request->content;
        $review['rate'] = $request->rate;
        $review->save();

        $user = User::find($request->userId);

        return response()->json([
            'review' => $review,
            'user' => $user['name'],
            'ava_user' => $user['img_path'],
            'user_id' => $user['id']
        ]);
    }
}
