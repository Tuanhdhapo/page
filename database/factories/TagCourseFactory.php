<?php

namespace Database\Factories;

use App\Models\TagCourse;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;

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
            'tag_id' => 5,
            'tag_id' => 2,
            'tag_id' => 3,
            'tag_id' => 4,
            'tag_id' => 1,
            'course_id' => Course::all()->unique()->random()->id,
        ];
    }
}
