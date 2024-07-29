<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $exam = Exam::create([
            'course_id' => 1,
            'name' => fake()->realText(20),
            'total_marks' => 20,
            'passing_marks' => 4,
        ]);

        foreach (range(1, 20) as $key => $value) {
            Question::create([
                'exam_id' => $exam->id,
                'name' => fake()->realText(30),
                'mark' => 1,
                'choices' => [
                    'correct' => random_int(0, 3),
                    'options' => [
                        fake()->realText(10),
                        fake()->realText(10),
                        fake()->realText(10),
                        fake()->realText(10),
                    ],
                ],
            ]);
        }
    }
}
