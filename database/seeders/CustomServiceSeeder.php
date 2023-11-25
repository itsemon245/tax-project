<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\CustomService;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        $pageNames = ['homepage', 'account'];

        foreach ($pageNames as $pageName) {
            $customServices = CustomService::factory(4)->create([
                'page_name' => $pageName
            ]);
            foreach ($customServices as $customService) {
                Image::create([
                    'imageable_type' => CustomService::class,
                    'imageable_id'   => $customService->id,
                    'url'            => picsum($customService->title)
                ]);
            }
        }
    }
}
