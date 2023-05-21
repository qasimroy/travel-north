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

        $adminRole = Role::create(['name' => 'admin']);
        $serviceProviderRole = Role::create(['name' => 'service-provider']);
        $userRole = Role::create(['name' => 'user']);

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@travel-north.com',
            'password' => 'test@123'
        ]);
        $user->assignRole($adminRole);

        $user = User::factory()->create([
            'name' => 'Service Provider',
            'email' => 'service-provider@travel-north.com',
            'password' => 'test@123'
        ]);
        $user->assignRole($serviceProviderRole);

        $user = User::factory()->create([
            'name' => 'Simple User',
            'email' => 'simple-user@travel-north.com',
            'password' => 'test@123'
        ]);
        $user->assignRole($userRole);
    }
}
