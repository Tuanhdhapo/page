<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Feedback::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'course_id' => Course::all()->random()->id,
            'lesson_id' => Lesson::all()->random()->id,
            'content' => $this->faker->realText(),
            'rate' => $this->faker->numberBetween(1, 5),
        ];
    }
}
