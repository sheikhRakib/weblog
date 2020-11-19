<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function assignPermissions()
    {
        // $data['users'] = $this->users;
        // $data['permissions'] = $this->permissions;

        // return view('backend.r&p.assignPermissions', $data);
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
