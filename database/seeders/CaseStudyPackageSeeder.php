<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CaseStudyPackage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CaseStudyPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $desc = fake()->realText();
        CaseStudyPackage::factory(3)->create([
            'page_description' => $desc
        ]);
    }
}
