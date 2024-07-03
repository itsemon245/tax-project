<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Video;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $courses = Course::factory(5)->create();
        foreach ($courses as $course) {
            Video::factory(10)->create(['course_id' => $course->id]);
        }
    }
}
