<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'access shoutbox', 
            'edit profile',

            'access articles',
            'manage articles',
            'view own articles',
            'write articles',
            'edit articles',
            'delete articles',
            'publish articles',

            'access roles & permissions',
            // yet to done
            'modify roles',
            'modify permissions',

            'access user section',
            'delete user',
        ];
        
        foreach($permissions as $permission) Permission::create(['name' => $permission]);
        // =======================================================================
        
        $system     = Role::create(['name' => 'system']);
        $admin      = Role::create(['name' => 'admin']);
        $moderator  = Role::create(['name' => 'moderator']);
        $user       = Role::create(['name' => 'user']);
        // =======================================================================

        $ap = [
            'edit profile',
            'access shoutbox',
            'access articles',
            'manage articles',
            'access roles & permissions',
            'modify roles',
            'modify permissions',
        ];
        $mp = [
            'edit profile',
            'access shoutbox',
            'access articles',
            'manage articles',
            'delete articles',
            'access roles & permissions',
        ];
        $up = [
            'edit profile',
            'access shoutbox',
            'access articles',
            'view own articles',
            'write articles',
            'edit articles',
            'delete articles',
            'publish articles',
        ];

        $admin->syncPermissions($ap);
        $moderator->syncPermissions($mp);
        $user->syncPermissions($up);
    }
}
