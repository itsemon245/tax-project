<?php

namespace Database\Seeders;

use App\Models\Map;
use Illuminate\Database\Seeder;

class MapSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $maps = [
            [
                'district' => 'Chattogram',
                'thana' => 'Karnaphuli',
                'location' => 'Agrabad',
                'address' => 'Agrabad, Chattogram',
                'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2929.3341919502127!2d91.81095568742512!3d22.326057875331323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd8b5353672d5%3A0x7e873374534df3f1!2sAgrabad%20Commercial%20Area%2C%20Chattogram!5e0!3m2!1sen!2sbd!4v1687848632152!5m2!1sen!2sbd',
            ],
            [
                'district' => 'Chattogram',
                'thana' => 'Karnaphuli',
                'location' => 'Andorkilla',
                'address' => 'Andorkilla,Chattogram',
                'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2462.985113842022!2d91.83764773765834!3d22.34199720163287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ad275ea7f1ae13%3A0x12c5488caf6d8df2!2sAnderkilla%20Bus%20Stop!5e0!3m2!1sen!2sbd!4v1687848507463!5m2!1sen!2sbd',
            ],
        ];
        foreach ($maps as $map) {
            Map::create($map);
        }
    }
}
