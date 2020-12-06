<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsController extends Controller
{
    private $users;
    private $permissions;
    private $roles;
    private $rp;

    public function __construct() {
        $this->users        = User::orderByDesc('id')->get();
        $this->roles        = DB::table('roles')->orderBy('name')->get();
        $this->permissions  = DB::table('permissions')->orderBy('name')->get();
        $this->rp           = Role::with('permissions')->orderBy('name')->get();
    }
    
    public function rolesAndPermissions() {
        $data['roles']          = $this->roles;
        $data['permissions']    = $this->permissions;
        $data['users']          = $this->users;
        $data['rp']             = $this->rp;

        return view('backend.management.rolesAndPermissions', $data);
    }


    // AJAX function
    public function modifyRoleOrPermission(Request $request) {
        $user = User::where('username', $request['username'])->first();

        if(!$user) abort(404);

        if($request['role']) {
            if( $user->hasRole($request['role']) ) {
                $user->removeRole($request['role']);
            } else {
                $user->assignRole($request['role']);
            }
        } 
        
        if($request['permission']){
            if($user->hasPermissionTo($request['permission'])) {
                $user->revokePermissionTo($request['permission']);
            } else {
                $user->givePermissionTo($request['permission']);
            }
        }

        return response()->json([
            'message' => 'success',
        ]);
    }


    // AJAX Function to get user permissions
    public function getUserPermissions(Request $request) {
        $user   = User::where('username', $request['username'])->first();
        $roles  = $user->getRoleNames();
        $dp     = $user->getDirectPermissions()->map(function($permission) {
            $permission->level = "Direct";
            return $permission;
        });
        $rp     = $user->getPermissionsViaRoles()->map(function($permission){
            $permission->level = "via Role";
            return $permission;
        });
        
        $userPermissions = $dp->merge($rp);
        
        return response()->json([
            'user' => $user,
            'roles' => $roles,
            'userPermissions' => $userPermissions,
        ]);
    }
}
