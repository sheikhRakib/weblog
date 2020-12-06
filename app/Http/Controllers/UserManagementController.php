<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserManagementController extends Controller
{
    public $users;
    public function __construct() {
        $this->users = User::orderByDesc('id')->get();
    }

    public function index() {
        $u = request()->query('u');
        $u = request()->has('u') ? User::where('username', $u)->first() : "";
        
        $data['u']      = $u;
        $data['users']  = $this->users;
        
        return view('backend.management.user', $data);
    }
}
