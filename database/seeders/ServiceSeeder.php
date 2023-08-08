<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceSubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                1 => [
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                ],
                2 => [
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                ],
                3 => [
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                ],
                4 => [
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                ],

            ],
            [
                5 => [
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                ],
            ],
            [
                6 => [
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                ],
                7 => [
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                ],
                8 => [
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                ],
                9 => [
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                    fake()->word() . " Service",
                ],
            ],
        ];

        foreach ($services as $cat_id => $subs) {
            $cat_id++;
            foreach ($subs as $sub_id => $services) {
                foreach ($services as $service) {
                    $sections = json_encode([
                        [
                            'title' => fake()->realText(10),
                            'description' => fake()->realText(500),
                            'image' => picsum($service)
                        ],
                        [
                            'title' => fake()->realText(10),
                            'description' => fake()->realText(500),
                            'image' => picsum($service)
                        ],
                    ]);
                    Service::create([
                        'title' => $service,
                        'service_category_id' => $cat_id,
                        'service_sub_category_id' => $sub_id,
                        'intro' => fake()->realText(50),
                        'description' => fake()->realText(300),
                        'price' => fake()->randomFloat(2, 10, 10000),
                        'price_description' => fake()->realText(100),
                        'rating' => 5,
                        'discount' => fake()->randomNumber(2),
                        'reviews' => fake()->numberBetween(100, 1000) . " Reviews",
                        'sections' => $sections
                    ]);
                }
            }
        }
    }
}
