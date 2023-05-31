<?php

namespace Database\Seeders;

use App\Models\Info;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Info::factory(4)->create(['section_id' => 1, 'title' => 'we help you file quickly and confidently']);
        Info::factory(4)->create(['section_id' => 2, 'title' => 'how income tax filling process works']);
    }
}
