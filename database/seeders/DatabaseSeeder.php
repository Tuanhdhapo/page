<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(CourseSeeder::class);
        // $this->call(LessonSeeder::class);
        // $this->call(TagSeeder::class);
        // $this->call(TagCourseSeeder::class);
        // $this->call(UserCourseSeeder::class);
        // $this->call(UserLessonSeeder::class);
        // $this->call(FeedbackSeeder::class);
        $this->call(DocumentsTableSeeder::class);
    }
}
