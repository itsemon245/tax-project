<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::factory(1)->create([
            'email' => 'admin@gmail.com',
            'user_name' => 'admin',
            'refer_link' => route('refer.link', 'admin')
        ]);


        //test user for refer
        User::factory(1)->create([
            'email' => 'two@gamil.com',
            'user_name' => 'two',
            'refer_link' => route('refer.link', 'two')
        ]);
        User::factory(1)->create([
            'email' => 'three@gmail.com',
            'user_name' => 'three',
            'refer_link' => route('refer.link', 'three')
        ]);
        User::factory(1)->create([
            'email' => 'four@gmail.com',
            'user_name' => 'four',
            'refer_link' => route('refer.link', 'four')
        ]);
    }
}
