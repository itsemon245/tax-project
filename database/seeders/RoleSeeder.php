<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $roles = [
            'super admin',
            'admin',
            'partner',
            'user',
            'employee',
        ];
        $sudoPermissions = Permission::get();
        $adminPermissions = Permission::where([
            ['name', 'NOT LIKE', '%user%'],
            ['name', 'NOT LIKE', '%role%'],
        ])->get();
        $partnerPermissions = Permission::where('name', 'LIKE', '%read%')->get();

        foreach ($roles as $role) {
            $newRole = Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);
            switch ($role) {
                case 'super admin':
                    $newRole->syncPermissions($sudoPermissions);
                    break;
                case 'admin':
                    $newRole->syncPermissions($sudoPermissions);
                    break;
                case 'partner':
                    $newRole->syncPermissions($partnerPermissions);
                    break;
                case 'user':
                    $newRole->syncPermissions($partnerPermissions);
                    break;
                default:
                    break;
            }
        }

        $admin = User::where('user_name', 'admin')->first();
        $admin?->assignRole('super admin');
        $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@gmail.com'],
            [
                'name' => 'Super Admin',
                'user_name' => 'super_admin',
                'image_url' => 'https://api.dicebear.com/6.x/initials/svg?seed=super-admin&backgroundType=gradientLinear&backgroundRotation=0,360',
                'phone' => '',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
                'refer_link' => route('refer.link', 'super_admin'),
            ]
        );
        $superAdmin->assignRole('super admin');
    }
}
