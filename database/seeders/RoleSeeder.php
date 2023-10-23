<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
            $newRole = Role::create(['name' => $role]);
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


        //test user for promo code
        $users = User::factory(5)->create();
        foreach ($users as $user) {
            $user->assignRole('user');
        }
        $partners = User::factory(5)->create();
        foreach ($partners as $user) {
            $user->assignRole('partner');
        }
        $employees = User::factory(5)->create();
        foreach ($employees as $user) {
            $user->assignRole('employee');
        }

        $admin = User::where('user_name', 'admin')->first();
        $admin->assignRole('super admin');
        $superAdmin = User::factory(1)->create([
            'email' => 'superadmin@gmail.com',
            'user_name' => 'super_admin',
            'refer_link' => route('refer.link', 'super_admin')
        ]);
        $superAdmin[0]->assignRole('super admin');
    }
}
