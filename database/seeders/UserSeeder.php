<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'user_name' => 'admin',
                'image_url' => 'https://api.dicebear.com/6.x/initials/svg?seed=admin&backgroundType=gradientLinear&backgroundRotation=0,360',
                'phone' => '',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
                'refer_link' => route('refer.link', 'admin'),
            ]
        );
    }
}
