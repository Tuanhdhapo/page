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
        return $this->belongsToMany(User::class, 'user_courses', 'course_id', 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_courses', 'course_id', 'tag_id');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    
    public function getNumberLessonAttribute()
    {
        return $this->lessons()->count();
    }

    public function getCourseTimeAttribute()
    {
        return $this->lessons()->sum('time');
    }

    public function getNumberUserStudentAttribute()
    {
        return $this->users()->where('role', config('constants.role.student'))->count();
    }

    public function scopefilter($query, $data)
    {
        if (isset($data['search_form_input'])) {
            $query->where('title', 'like', '%' . $data['search_form_input'] . '%')
                ->orWhere('description', 'like', '%' . $data['search_form_input'] . '%');
        }
        
        if (isset($data['sort'])) {
            if ($data['sort'] == config('constants.options.newest')) {
                $query->orderByDesc('id');
            } else {
                $query->orderBy('id');
            }
        }

        if (isset($data['mentor'])) {
            $query->whereHas('users', function ($subquery) use ($data) {
                $subquery->where('user_id', $data['mentor']);
            });
        }

        if (isset($data['learner'])) {
            if ($data['learner'] == config('constants.options.ascending')) {
                $query->withCount([
                    'users' => function ($subquery) {
                        $subquery->where('role', User::ROLE['student']);
                    }
                ])->orderBy('users_count');
            } else {
                $query->withCount([
                    'users' => function ($subquery) {
                        $subquery->where('role', User::ROLE['student']);
                    }
                ])->orderByDesc('users_count');
            }
        }

        if (isset($data['time'])) {
            if ($data['times'] == config('constants.options.ascending')) {
                $query->addSelect(['time' => Lesson::selectRaw('sum(time) as total')
                    ->whereColumn('courses_id', 'courses.id')])
                    ->orderBy('time');
            } else {
                $query->addSelect(['time' => Lesson::selectRaw('sum(time) as total')
                    ->whereColumn('courses_id', 'courses.id')])
                    ->orderByDesc('time');
            }
        }

        if (isset($data['lessons'])) {
            if ($data['lessons'] == config('constants.options.ascending')) {
                $query->withCount(['lessons'])->orderBy('lessons_count')->get();
            } else {
                $query->withCount(['lessons'])->orderByDesc('lessons_count')->get();
            }
        }

        if (isset($data['tags'])) {
            $query->whereHas('tags', function ($subquery) use ($data) {
                $subquery->where('tag_id', $data['tags']);
            });
        }

        if (isset($data['reviews'])) {
            if ($data['review'] == config('constants.options.ascending')) {
                $query->addSelect(['rate' => Feedback::selectRaw('avg(rate) as total')
                    ->whereColumn('courses_id', 'courses.id')])
                    ->orderBy('rate');
            } else {
                $query->addSelect(['rate' => Feedback::selectRaw('avg(rate) as total')
                    ->whereColumn('courses_id', 'courses.id')])
                    ->orderByDesc('rate');
            }
        }
    }
}
