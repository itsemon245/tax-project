<?php

namespace Database\Seeders;

use App\Models\Industry;
use App\Models\Section;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $industries = Industry::factory(4)->create();

        foreach ($industries as $industry) {
            Section::factory(3)->create([
                'sectionable_type' => 'Industry',
                'sectionable_id' => $industry->id,
            ]);
        }
    }
}
