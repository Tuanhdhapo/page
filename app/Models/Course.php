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
        'content',
        'learners',
        'lessons',
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


    
    public function scopeTagsCourse($query, $id)
    {
        $query->leftJoin('tag_courses', 'courses.id', 'tag_courses.course_id')
            ->leftJoin('tags', 'tag_courses.tag_id', 'tags.id')
            ->where('tag_courses.course_id', $id);
    }

    public function scopeTeacherOfCourse($query, $id)
    {
        $query->leftJoin('user_courses', 'courses.id', 'user_courses.course_id')
            ->leftJoin('users', 'user_courses.user_id', 'users.id')
            ->where('users.role', User::ROLE['mentor'])
            ->where('user_courses.course_id', $id);
    }

    public function scopeInforLessons($query, $id)
    {
        $query->join('lessons', 'courses.id', '=', 'lessons.course_id')
            ->select('lessons.*')
            ->where('lessons.course_id', '=', $id);
    }


    public function scopeMainCourse($query)
    {
        $query->withCount(['users' => function ($subquery) {
            $subquery->where('role', config('constants.role.student'));
        }
        ])->orderByDesc('users_count')->limit(3);
    }

    public function scopeOtherCourse($query)
    {
        $query->orderByDesc('id')->limit(3);
    }

     public function scopeShowOtherCourses($query, $courseId)
    {
        $query->where('id', '<>', $courseId)->limit(5);
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
            } elseif ($data['learner'] == config('constants.options.decrease')) {
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
            } elseif ($data['time'] == config('constants.options.decrease')) {
                $query->addSelect(['time' => Lesson::selectRaw('sum(time) as total')
                    ->whereColumn('courses_id', 'courses.id')])
                    ->orderByDesc('time');
            }
        }

        if (isset($data['lessons'])) {
            if ($data['lessons'] == config('constants.options.ascending')) {
                $query->withCount(['lessons'])->orderBy('lessons_count')->get();
            } elseif ($data['lessons'] == config('constants.options.decrease')) {
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
            } elseif ($data['reviews'] == config('constants.options.decrease')) {
                $query->addSelect(['rate' => Feedback::selectRaw('avg(rate) as total')
                    ->whereColumn('courses_id', 'courses.id')])
                    ->orderByDesc('rate');
            }
        }

    }
}
