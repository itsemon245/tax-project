<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $logo = picsum(fake()->name());
        Setting::create([
            'basic' => [
                'logo' => picsum('logo'),
                'email' => fake()->safeEmail(),
                'phone' => fake()->phoneNumber(),
                'whatsapp' => fake()->phoneNumber(),
                'favicon' => picsum('favicon'),
                'address' => fake()->address(),
            ],
            'reference' => [
                'commission' => random_int(5, 30),
                'withdrawal' => 500,
            ],
            'payment' => [
                [
                    'method' => 'bkash',
                    'number' => fake()->phoneNumber(),
                ],
                [
                    'method' => 'nagad',
                    'number' => fake()->phoneNumber(),
                ],
                [
                    'method' => 'rocket',
                    'number' => fake()->phoneNumber(),
                ]
                ],
            'return_links' => [
                [
                    'title' => fake()->realText(10),
                    'link' => fake()->url(),
                ],
                [
                    'title' => fake()->realText(10),
                    'link' => fake()->url(),
                ],
            ]
        ]);
    }
}
