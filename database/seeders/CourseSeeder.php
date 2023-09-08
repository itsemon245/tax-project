<?php

namespace Database\Seeders;

use App\Models\Video;
use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::factory(5)->create();
        foreach ($courses as $course) {
            Video::factory(10)->create(['course_id' => $course->id]);
        }
    }
}
