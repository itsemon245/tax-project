<?php

namespace Database\Seeders;

use App\Models\CaseStudyPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaseStudyPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $page = [
            'title' => 'Case Study Lab',
            'hero_title' => fake()->realText(30),
            'hero_description' => fake()->realText(300),
            'hero_image' => picsum('case-study'),
            'description' => fake()->realText(300)
        ];

        CaseStudyPage::create($page);
    }
}
