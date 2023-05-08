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
        foreach (socialItems() as $item) {
            $name = $item['name'];
            $icon = $item['icon'];
            SocialHandle::create([
                'name' => $name,
                'icon' => $icon,
                'link' => "https://$name.com"
            ]);
        }
    }
}
