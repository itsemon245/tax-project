<?php

namespace Database\Seeders;

use App\Models\CaseStudy;
use App\Models\CaseStudyPackage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaseStudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = CaseStudyPackage::get('id');

        foreach ($packages as $package) {
            CaseStudy::factory(10)->create([
                'case_study_package_id' => $package->id
            ]);
        }
    }
}
