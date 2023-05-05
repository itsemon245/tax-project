<?php

namespace Database\Seeders;

use App\Models\SocialHandle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialHandleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialHandle::factory(4)->create();
    }
}
