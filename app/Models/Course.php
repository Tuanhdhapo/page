<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'img_path',
        'learners',
        'quizzes',
        'tag',
        'price',
        'description'
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
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
        return $this->hasMany(Feedback::class, 'course_id');
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

    public function getTeachersOfCourseAttribute()
    {
        return $this->users()->where('role', config('constants.role.teacher'))->get();
    }

    public function getOtherCoursesAttribute()
    {
        return $this->where('id', '<>', $this->id)->limit(config('constants.showcourse.othercourse'))->get();
    }
    
    public function getCheckJoinedCourseAttribute()
    {
        return $this->users()->where('user_id', Auth::id())->first();
    }

    public function getTagsAttribute()
    {
        return $this->tags()->get();
    }

    public function scopefilter($query, $data)
    {
        if (isset($data['keyword'])) {
            $query->where('title', 'like', '%' . $data['keyword'] . '%')
                ->orWhere('description', 'like', '%' . $data['keyword'] . '%');
        }
        
        if (isset($data['sort'])) {
            ($data['sort'] == config('constants.options.newest')) ? $query->orderByDesc('id') : $query->orderBy('id');
        }

        if (isset($data['mentor'])) {
            $query->whereHas('users', function ($subquery) use ($data) {
                $subquery->where('user_id', $data['mentor']);
            });
        }

        if (isset($data['learner'])) {
            $query->withCount([
                'users' => function ($subquery) {
                    $subquery->where('role', User::ROLE['student']);
                }
            ]);
            ($data['learner'] == config('constants.options.ascending')) ? $query->orderBy('users_count') : $query->orderByDesc('users_count');
        }

        if (isset($data['times'])) {
            $query->addSelect(['time' => Lesson::selectRaw('sum(time) as total')
                    ->whereColumn('course_id', 'courses.id')]);
            ($data['times'] == config('constants.options.ascending')) ? $query->orderBy('time') : $query->orderByDesc('time');
        }

        if (isset($data['lessons'])) {
            $query->withCount(['lessons']);
            ($data['lessons'] == config('constants.options.ascending')) ? $query->orderBy('lessons_count')->get() : $query->orderByDesc('lessons_count')->get();
        }

        if (isset($data['tags'])) {
            $query->whereHas('tags', function ($subquery) use ($data) {
                $subquery->where('tag_id', $data['tags']);
            });
        }

        if (isset($data['reviews'])) {
            $query->addSelect(['rate' => Feedback::selectRaw('avg(rate) as total')
                ->whereColumn('courses_id', 'courses.id')]);
            ($data['review'] == config('constants.options.ascending')) ? $query->orderBy('rate') : $query->orderByDesc('rate');
        }
    }
    
    public function getreviewsAttribute()
    {
        return $this->feedback()->count();
    }

    public function getNumberRateAttribute()
    {
        return $this->feedback()
        ->selectRaw('count(*) as total, rate')
        ->groupBy('rate')
        ->get();
    }

    public function getAvgRatingAttribute()
    {
        return ceil($this->feedback()->avg('rate'));
    }
    
    public function scopeHomeOtherCourse($query)
    {
       $query->inRandomOrder()->limit(config('constants.showcourse.course'));
    }
}
