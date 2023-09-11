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
            'homepage' => //group
            [
                'homepage' => //operation
                [
                    'manage', //action
                ],
                'banner' => //operation
                [
                    'manage', //action
                ],
                'product' => //operation
                [
                    'manage', //action
                ],
                'appointment section' => //operation
                [
                    'manage', //action
                ],
                'achievement' => //operation
                [
                    'manage', //action
                ],
                'info section' => //operation
                [
                    'manage', //action
                ],
            ],
            'uncategorized' => //group
            [
                'visit' => //operation
                [
                    'admin panel', //action
                ],
            ],
        ];

        foreach ($permissions as $group => $items) {
            foreach ($items as $operation => $actions) {
                foreach ($actions as $action) {
                    Permission::create([
                        'name' => "$action $operation",
                        'group' => $group
                    ]);
                }
            }
        }
    }
}
