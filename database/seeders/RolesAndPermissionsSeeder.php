<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $adminRole = Role::create(['name' => 'Admin']);
        $serviceProviderRole = Role::create(['name' => 'Service Provider']);
        $userRole = Role::create(['name' => 'User']);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@travel-north.com',
            'password' => 'test@123'
        ]);
        $user->assignRole($adminRole);

        $user = User::create([
            'name' => 'Qasim',
            'email' => 'qasim@travel-north.com',
            'password' => 'test@123'
        ]);
        $user->assignRole($userRole);
    }
}
