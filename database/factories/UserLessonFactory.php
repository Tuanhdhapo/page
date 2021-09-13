<?php

namespace Database\Factories;

use App\Models\UserLesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserLessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserLesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 200),
            'lesson_id' => rand(1, 200),
            'learned' => rand(0, 1)
        ];
    }
}
