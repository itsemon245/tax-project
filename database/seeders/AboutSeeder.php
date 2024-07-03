<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Section;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $about = About::create([
            'description' => fake()->realText(),
        ]);
        Section::factory(3)->create([
            'sectionable_type' => 'About',
            'sectionable_id' => $about->id,
        ]);
    }
}
