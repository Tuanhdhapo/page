<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'course_id',
        'lesson_id',
        'content',
        'rate'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_id', 'feedback_id');
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'lesson_id', 'feedback_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_id', 'feedback_id');
    }

    public function scopeFeedbacksOfCourse($query, $courseId)
    {
        $query->leftJoin('users', 'feedback.user_id', 'users.id')
           ->select('feedback.*', 'users.img_path', 'users.name')
           ->where('course_id', '=', $courseId);
    }

    
    public function replyReviews()
    {
        return $this->hasMany(ReplyReview::class, 'feedback_id');
    }
}
