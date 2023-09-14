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
            'service page' => //group
            [
                'service' => //operation
                [
                    'manage', //action
                ],
            ],
            'pages & sections' => //group
            [
                'book' => //operation
                [
                    'manage', //action
                ],
                'industry' => //operation
                [
                    'manage', //action
                ],
                'about' => //operation
                [
                    'manage', //action
                ],
                'social media' => //operation
                [
                    'manage', //action
                ],
            ],
            'branch' => //group
            [
                'map' => //operation
                [
                    'create', //action
                    'update', //action
                    'delete', //action
                ],
            ],
            'training' => //group
            [
                'course' => //operation
                [
                    'manage', //action
                ],
                'video' => //operation
                [
                    'manage', //action
                ],
                'exam' => //operation
                [
                    'manage', //action
                ],
                'case study' => //operation
                [
                    'manage', //action
                ],
            ],
            'people' => //group
            [
                'partner' => //operation
                [
                    'manage', //action
                ],
                'partner request' => //operation
                [
                    'manage', //action
                ],
                'client studio' => //operation
                [
                    'manage', //action
                ],
            ],
            'tax expert' => //group
            [
                'expert' => //operation
                [
                    'create', //action
                    'update', //action
                    'delete', //action
                ],
                'consultation' => //operation
                [
                    'update', //action
                    'approve', //action
                    'delete', //action
                ],
            ],

            'project' => //group
            [
                'discussion' => //operation
                [
                    'manage' //action
                ],
                'progress' => //operation
                [
                    'create', //action
                    'update', //action
                    'delete', //action
                    'update task' //action
                ],
                'client' => //operation
                [
                    'manage' //action
                ],
            ],
            'user\'s data' => //group
            [
                'document' => //operation
                [
                    'update', //action
                    'approve', //action
                    'delete' //action
                ],
            ],
            'appointment' => //group
            [
                'appointment' => //operation
                [
                    'update', //action
                    'delete', //action
                    'approve', //action
                ],
            ],
            'user' => //group
            [
                'user' => //operation
                [
                    'create', //action
                    'update', //action
                    'delete', //action
                ],
            ],
            'accounting' => //group
            [
                'invoice' => //operation
                [
                    'manage',
                ],
                'report' => //operation
                [
                    'manage',
                ],
                'chalan' => //operation
                [
                    'manage',
                ],
                'return' => //operation
                [
                    'manage',
                ],
                'withdraw request' => //operation
                [
                    'approve',
                ],
            ],
            'management' => //group
            [
                'role' => //operation
                [
                    'create', //action
                    'update', //action
                    'delete', //action
                ],
                'promo code' => //operation
                [
                    'manage', //action
                ],
                'reviews' => //operation
                [
                    'manage', //action
                ],
                'order' => //operation
                [
                    'manage', //action
                ],
            ],


            'invoice' => //group
            [
                'invoice' => //operation
                [
                    'create', //action
                    'update', //action
                    'delete', //action
                    'send', //action
                ],
            ],
            'expense' => //group
            [
                'expense' => //operation
                [
                    'create', //action
                    'update', //action
                    'delete', //action
                    'print', //action
                ],
            ],
            'time tracking' => //group
            [
                'event' => //operation
                [
                    'create', //action
                    'update', //action
                    'delete', //action
                ],
            ],
            'tax calculator' =>
            [
                'tax setting' =>
                [
                    'create',
                    'update',
                    'delete',
                ],
                'result' =>
                [
                    'manage',
                ]
            ],
            'setting' =>
            [
                'basic setting' => //operation
                [
                    'manage', //action
                ],
                'referral setting' => //operation
                [
                    'manage', //action
                ],
                'payment setting' => //operation
                [
                    'manage', //action
                ],
                'return link setting' => //operation
                [
                    'manage', //action
                ],
            ],

            'uncategorized' => //group
            [
                'admin panel' => //operation
                [
                    'visit', //action
                ],


            ],
        ];

        foreach ($permissions as $group => $items) {
            foreach ($items as $operation => $actions) {
                // create read permission for each operation
                Permission::create([
                    'name' => "read $operation",
                    'group' => $group
                ]);
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
