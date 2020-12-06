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
            'modify roles',
            'modify permissions',

            'access user section',
            'delete user',
        ];
        
        foreach($permissions as $permission) Permission::create(['name' => $permission]);
        // =======================================================================
        
        $admin      = Role::create(['name' => 'admin']);
        $moderator  = Role::create(['name' => 'moderator']);
        $user       = Role::create(['name' => 'user']);

        $social     = Role::create(['name' => 'social']);
        $writer     = Role::create(['name' => 'writer']);
        $watcher     = Role::create(['name' => 'watcher']);

        // =======================================================================

        $user_permissions = [
            'edit profile',            
        ];
        $moderator_permissions = [
            'access articles',
            'manage articles',
            'delete articles',
            'access roles & permissions',
        ];
        $admin_permissions = [
            'access articles',
            'manage articles',
            'access roles & permissions',
            'modify roles',
            'modify permissions',
            'access user section',
            'delete user',
        ];

        $social_permissions = [
            'access shoutbox',
        ];
        $writer_permissions = [
            'access articles',
            'view own articles',
            'write articles',
            'edit articles',
            'delete articles',
            'publish articles',
        ];
        

        $user->syncPermissions($user_permissions);
        $moderator->syncPermissions($moderator_permissions);
        $admin->syncPermissions($admin_permissions);

        $social->syncPermissions($social_permissions);
        $writer->syncPermissions($writer_permissions);
    }
}
