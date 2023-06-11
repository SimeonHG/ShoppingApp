<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Roles
        $administratorRole = Role::create(['name' => 'administrator']);
        $moderatorRole = Role::create(['name' => 'moderator']);
        $buyerRole = Role::create(['name' => 'buyer']);
        $providerRole = Role::create(['name' => 'provider']);

        // Permissions
        $permissions = [
            'access_admin_panel',
            'manage_products',
            'manage_shops',
            'view_products'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assign permissions to roles
        $administratorRole->givePermissionTo(Permission::all());
        $moderatorRole->givePermissionTo(['manage_products', 'manage_shops',]);
        $providerRole->givePermissionTo('manage_products');
        $buyerRole->givePermissionTo('view_products');
    }

}
