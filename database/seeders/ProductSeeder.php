<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'title' => 'Free',
                'sub_title' => 'Free expert assist included',
                'discount' => 100,
                'is_discount_fixed' => false,
                'type' => 'Silver'
            ],
            [
                'title' => 'Deluxe',
                'sub_title' => 'Free expert assist included',
                'type' => 'Gold'
            ],
            [
                'title' => 'Premium',
                'sub_title' => 'Free expert assist included',
                'type' => 'Platinum'
            ],
            [
                'title' => 'Family Bundle',
                'sub_title' => 'Free expert assist included',
                'type' => 'Exclusive'
            ],
        ];

            foreach ($products as $product) {
                Product::factory(4)->create([
                    ...$product,
                    'product_category_id' => 1,
                ]);
            }
            foreach ($products as $product) {
                Product::factory(4)->create([
                    ...$product,
                    'product_category_id' => 2,
                ]);
            }

    }
}
