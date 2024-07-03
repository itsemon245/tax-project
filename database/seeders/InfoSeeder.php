<?php

namespace Database\Seeders;

use App\Models\Info;
use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Info::factory(6)->create(['section_id' => 1, 'title' => 'we help you file quickly and confidently', 'page_name' => 'homepage']);
        Info::factory(6)->create(['section_id' => 2, 'title' => 'how income tax filling process works', 'page_name' => 'homepage']);
        Info::factory(6)->create(['section_id' => 1, 'title' => 'we help you file quickly and confidently', 'page_name' => 'tax service page']);
        Info::factory(6)->create(['section_id' => 2, 'title' => 'how income tax filling process works', 'page_name' => 'tax service page']);
        Info::factory(6)->create(['section_id' => 1, 'title' => 'we help you file quickly and confidently', 'page_name' => 'vat service page']);
        Info::factory(6)->create(['section_id' => 2, 'title' => 'how income tax filling process works', 'page_name' => 'vat service page']);
        Info::factory(6)->create(['section_id' => 1, 'title' => 'we help you file quickly and confidently', 'page_name' => 'misc service']);
        Info::factory(6)->create(['section_id' => 2, 'title' => 'how income tax filling process works', 'page_name' => 'misc service']);
    }
}
