<?php

namespace Database\Seeders;

use App\Models\CaseStudyPackage;
use Illuminate\Database\Seeder;

class CaseStudyPackageSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $desc = fake()->realText();
        CaseStudyPackage::factory(3)->create([
            'page_description' => $desc,
        ]);
    }
}
