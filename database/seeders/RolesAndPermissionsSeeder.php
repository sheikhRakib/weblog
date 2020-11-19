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

        $articlePermissions = [
            'access articles',
            'write articles',
            'edit articles',
            'delete articles',
            'publish articles',
        ];
        $rolePermissions = [
            'access roles',
            'assign roles',
            'retract roles',
        ];
        $permissionPermissions = [
            'access permissions',
            'assign permissions',
            'retract permissions',
        ];
        $userPermissions = [
            'access user section',
            'delete user',
        ];
        
        foreach($articlePermissions as $permission) Permission::create(['name' => $permission]);
        foreach($rolePermissions as $permission) Permission::create(['name' => $permission]);
        foreach($permissionPermissions as $permission) Permission::create(['name' => $permission]);
        foreach($userPermissions as $permission) Permission::create(['name' => $permission]);
        // =======================================================================
        
        $system     = Role::create(['name' => 'system']);
        $admin      = Role::create(['name' => 'admin']);
        $moderator  = Role::create(['name' => 'moderator']);
        $user       = Role::create(['name' => 'user']);
        // =======================================================================

        $ap = [
            'access articles',
            'delete articles',
            'access roles',
            'assign roles',
            'retract roles',
            'access permissions', 
            'assign permissions',
            'retract permissions',
            'access user section',
            'delete user',
        ];
        $mp = [
            'access articles',
            'delete articles',
            'access permissions', 
            'retract permissions',
            'access user section',
            'delete user',
        ];
        $up = [
            'access articles',
            'write articles',
            'edit articles',
            'delete articles',
            'publish articles',
        ];

        $user->syncPermissions($up);
    }
}
