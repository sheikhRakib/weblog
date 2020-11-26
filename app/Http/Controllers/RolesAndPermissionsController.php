<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsController extends Controller
{
    private $users;
    private $permissions;
    private $roles;

    public function __construct()
    {
        $this->users = User::all();
        $this->roles = DB::table('roles')->get();
        $this->permissions = DB::table('permissions')->get();

    }
    
    public function rolesAndPermissions()
    {
        $data['roles'] = $this->roles;
        $data['permissions'] = $this->permissions;
        $data['users'] = $this->users;

        return view('backend.r&p.rolesAndPermissions', $data);        
    }


    // AJAX function
    public function modifyRoleOrPermission(Request $request)
    {
        $user = User::where('username', $request['username'])->first();
        if(!$user) abort(404);

        if($request['role']) {
            $user->syncPermissions();
            $user->syncRoles($request['role']);
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
    public function getUserPermissions(Request $request)
    {
        $user = User::where('username', $request['username'])->first();
        $roles = $user->getRoleNames();
        $userPermissions = $user->getAllPermissions();
        
        return response()->json([
            'user' => $user,
            'roles' => $roles,
            'userPermissions' => $userPermissions,
        ]);
    }
}
