<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Lesson extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'requirement',
    ];

    public function courses()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'lesson_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_lessons', 'lesson_id', 'user_id');
    }

     public function getCheckJoinedLessonAttribute()
    {
        return $this->users->contains(Auth::user()->id ?? null);
    }

    // public function scopeCourseOfLesson($query, $id)
    // {
    //     $query->leftJoin('courses', 'lessons.course_id', 'courses.id')
    //        ->where('lessons.id', $id)
    //        ->select('courses.*');
    // }

    public function getJoinAttribute()
    {
        return $this->users->contains(Auth::user()->id ?? null);
    }

    public function scopeSearch($query, $data)
    {
        if (isset($data['key_detail_course'])) {
            $query->where('title', 'like', '%' . $data['key_detail_course'] . '%');
        }
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'lesson_id');
    }

    public function scopeDocumentsOfLesson($query, $id)
    {
        $query->leftJoin('documents', 'lessons.id', 'documents.lesson_id')
            ->where('documents.lesson_id', $id)
            ->select('documents.*');
    }
}
