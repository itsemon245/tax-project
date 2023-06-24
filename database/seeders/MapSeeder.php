<?php

namespace Database\Seeders;

use App\Models\Map;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Map::create([
            'location'=> 'Chattagram',
            'address' => 'Soltgola Crossing',
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118103.47450132135!2d91.73746698943835!3d22.32591352860032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd8a64095dfd3%3A0x5015cc5bcb6905d9!2z4Kaa4Kaf4KeN4Kaf4KaX4KeN4Kaw4Ka-4Kau!5e0!3m2!1sbn!2sbd!4v1687498520031!5m2!1sbn!2sbd',

        ]);
    }
}
