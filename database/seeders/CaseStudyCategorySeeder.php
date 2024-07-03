<?php

namespace Database\Seeders;

use App\Models\CaseStudyCategory;
use App\Models\CaseStudyPackage;
use Illuminate\Database\Seeder;

class CaseStudyCategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $packages = CaseStudyPackage::get('id');
        foreach ($packages as $key => $package) {
            CaseStudyCategory::factory(5)->create([
                'case_study_package_id' => $package->id,
            ]);
        }
    }
}
