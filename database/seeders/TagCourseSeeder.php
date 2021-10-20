<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CourseTag;
use App\Models\TagCourse;

class TagCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TagCourse::factory()->count(100)->create();
    }
}
