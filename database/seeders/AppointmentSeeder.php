<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $items = [
            [
                'title' => 'Expert Assist',
                'sub_title' => 'File with free expert',
                'tag' => 'free for everyone',
            ],
            [
                'title' => 'Specialist Assist',
                'sub_title' => 'File with free specialist',
                'tag' => 'free for partner',
            ],
            [
                'title' => 'Professional Assist',
                'sub_title' => 'File with free professional',
                'tag' => 'paid',
            ],
        ];

        foreach ($items as $item) {
            Appointment::factory(1)->create($item);
        }
    }
}
