<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'create' => [
                'user',
                'role',
                'banner',
                'info',
                'testimonial',
                'product category',
                'product sub category',
                'product',
                'promo code',
                'invoice',
                'social handle',
                'book',
                'map',
                'course',
                'video',
            ],
            'read' => [
                'user',
                'role',
                'banner',
                'info',
                'testimonial',
                'product category',
                'product sub category',
                'product',
                'promo code',
                'invoice',
                'social handle',
                'book',
                'map',
                'course',
                'video',
            ],
            'update' => [
                'user',
                'role',
                'banner',
                'info',
                'testimonial',
                'product category',
                'product sub category',
                'product',
                'promo code',
                'invoice',
                'social handle',
                'book',
                'map',
                'course',
                'video',
            ],
            'delete' => [
                'user',
                'role',
                'banner',
                'info',
                'testimonial',
                'product category',
                'product sub category',
                'product',
                'promo code',
                'invoice',
                'social handle',
            ],
            'visit' => [
                'admin panel',
                'control panel',
            ],
        ];

        foreach ($permissions as $do => $items) {
            foreach ($items as $operation) {
                Permission::create(['name'=> "$do $operation"]);
            }
        }
    }
}
