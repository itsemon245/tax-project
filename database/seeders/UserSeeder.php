<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $admin = User::factory(1)->create([
            'email' => 'admin@gmail.com',
            'user_name' => 'admin',
            'refer_link' => route('refer.link', 'admin'),
            'email_verified_at' => now(),
        ]);
    }
}
