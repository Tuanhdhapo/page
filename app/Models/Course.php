<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'img_path',
        'learners',
        'times',
        'quizzes',
        'tag',
        'price',
        'description'
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_courses', 'user_id', 'course_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_courses', 'tag_id', 'course_id');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }
}
