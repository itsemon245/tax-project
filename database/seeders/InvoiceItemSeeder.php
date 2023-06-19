<?php

namespace Database\Seeders;

use App\Models\InvoiceItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InvoiceItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $taxes = [
            [
                'name' => fake()->word(),
                'rate' => fake()->numberBetween(5, 25),
                'number' => fake()->numberBetween(10, 100),
            ]
        ];
        InvoiceItem::create([
            'invoice_id' => 1,
            'name' => fake()->realText(15),
            'description' => fake()->realText(),
            'rate' => fake()->numberBetween(10,100),
            'qty' => fake()->numberBetween(1,20),
            'total' => fake()->numberBetween(100,1000),
            'taxes' => json_encode($taxes),
        ]);
    }
}
