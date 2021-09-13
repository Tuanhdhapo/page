<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'img_path' => $this->faker->unique()->imageUrl,
            'title' => $this->faker->unique()->name,
            'content'=> $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 0, 1000000),
            'description' => $this->faker->paragraph
        ];
    }
}
