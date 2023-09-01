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
            'reference' => [
                'commission' => random_int(5,30),
                'withdrawal' => 500,
            ],
            'basic' => [
                'logo' => $logo,
                'email' => fake()->email(),
                'phone' => fake()->phoneNumber(11),
                'whatsapp' => fake()->phoneNumber(11),
                'favicon' => $logo,
                'address' => fake()->address(),
            ],
            'payment' => [
                'payment_methods' => 'Bkash',
                'accounts' => fake()->phoneNumber(11),
            ],
        ]);
    }
}
