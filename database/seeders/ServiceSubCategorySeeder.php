<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceSubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            1=>fake('en_US')->word(10),
            2=>fake('en_US')->word(10),
            3=>fake('en_US')->word(10),
            4=>fake('en_US')->word(10),
        ];

        foreach ($services as $key => $name) {
            ServiceSubCategory::create([
                'service_category_id' => $key,
                'name'=> $name,
                'description'=> fake()->realText(),
                'image'=> "https://picsum.photos/seed/$name/200"
            ]);
        }
    }
}
