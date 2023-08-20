<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CaseStudyPackage;
use App\Models\CaseStudyCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CaseStudyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = CaseStudyPackage::get('id');
        foreach ($packages as $key => $package) {
            CaseStudyCategory::factory(5)->create([
                'case_study_package_id' => $package->id
            ]);
        }
    }
}
