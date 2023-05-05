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
        $socials = ['facebook', 'twitter', 'instagram', 'linkedin', 'whatsapp', 'messenger'];
        foreach ($socials as $name) {
            SocialHandle::factory(1)->create([
                'name' => $name,
                'link' => "https://$name.com"
            ]);
        }
    }
}
