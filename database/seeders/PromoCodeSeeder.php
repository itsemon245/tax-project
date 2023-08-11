<?php

namespace Database\Seeders;

use App\Models\PromoCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromoCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PromoCode::factory(1)->create([
            'code' => 'Code one',
        ]);
        PromoCode::factory(1)->create([
            'code' => 'Code Two',
        ]);
        PromoCode::factory(1)->create([
            'code' => 'Code Three',
        ]);
    }
}
