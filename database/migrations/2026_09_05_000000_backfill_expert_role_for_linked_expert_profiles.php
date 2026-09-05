<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

return new class() extends Migration {
    /**
     * Assign the required expert role to the users already linked to expert profiles.
     */
    public function up(): void {
        $role = Role::firstOrCreate([
            'name' => 'expert',
            'guard_name' => 'web',
        ]);

        User::whereHas('expertProfile')->eachById(function (User $user) use ($role) {
            $user->assignRole($role);
        });

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }

    /**
     * This data backfill is intentionally not reversed to avoid removing roles assigned after deployment.
     */
    public function down(): void {
    }
};
