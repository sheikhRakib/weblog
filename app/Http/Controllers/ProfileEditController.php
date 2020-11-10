<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\EditEmailRequest;
use App\Http\Requests\Profile\EditInfoRequest;
use App\Http\Requests\Profile\EditPasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileEditController extends Controller
{
    public function index()
    {
        return redirect()->route('profile.edit.info');
    }

    public function info()
    {
        return view('backend.profile.edit.info');
    }
    
    public function email()
    {
        return view('backend.profile.edit.email');
    }

    public function password()
    {
        return view('backend.profile.edit.password');
    }

    public function update_info(EditInfoRequest $request)
    {
        $user = User::find(Auth::id());
    
        $user->name      = $request['name'];
        $user->intro     = $request['intro'];
        $user->sex       = $request['sex'];
        $user->dob       = $request['dob'] ? date("Y-m-d", strtotime($request['dob'])) :  $request['dob'];
        $user->location  = $request['location'];
        $user->education = $request['education'];
        $user->workplace = $request['workplace'];
        $user->save();
        
        Session::flash('success', "Updated");
        return redirect()->back();
    }

    public function update_email(EditEmailRequest $request) {
        if (Auth::user()->email == $request['old-email'] && 
        Hash::check( $request['password'], Auth::user()->password)) 
        {
            $user = User::find(Auth::id());
            
            $user->email = $request['email'];
            $user->save();
        
            Session::flash('success', 'Updated'); 
        } else {
            Session::flash('error', 'Something went wrong!'); 
        }    
        return redirect()->back();
    }

    public function update_password(EditPasswordRequest $request) {
        if (Hash::check( $request['old-password'], Auth::user()->password)) {
            $user = User::find(Auth::id());
            
            $user->password = Hash::make($request['password']);
            $user->save();
        
            Session::flash('success', 'Updated'); 
        } else {
            Session::flash('error', 'Something went wrong!'); 
        }    
        return redirect()->back();
    }
}
