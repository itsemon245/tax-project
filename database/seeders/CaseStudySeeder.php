<?php

namespace Database\Seeders;

use App\Models\CaseStudy;
use App\Models\CaseStudyCategory;
use App\Models\CaseStudyPackage;
use Illuminate\Database\Seeder;

class CaseStudySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $packages = CaseStudyPackage::get('id');
        $categories = CaseStudyCategory::get('id');

        foreach ($packages as $package) {
            foreach ($categories as $key => $category) {
                CaseStudy::factory(8)->create([
                    'case_study_package_id' => $package->id,
                    'case_study_category_id' => $category->id,
                ]);
            }
        }
    }
}
