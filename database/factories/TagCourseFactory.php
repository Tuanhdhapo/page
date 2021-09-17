<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\TagCourse;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagCourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TagCourse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tag_id' => Tag::all()->unique()->random()->id,
            'course_id' => Course::all()->unique()->random()->id,
        ];
    }
}
