<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $videos = [
            'https://www.youtube.com/watch?v=bpGvVI7NM_k',
            'https://www.youtube.com/watch?v=OoQLoKHhohg',
            'https://www.youtube.com/watch?v=MnpuK0MK4yo',
            'https://www.youtube.com/watch?v=huMTT5Pb8b8',
        ];
        return [
           'course_id'=> random_int(1,5),
           'title'=> fake()->words(7, true),
           'video'=> fake()->randomElement($videos),
           'section'=> fake()->randomElement(['section 1', 'section 2']),
           'description'=> fake()->realText(300),
        ];
    }
}
