<?php

namespace App\Http\Controllers;

use App\Models\ShoutBox;
use Illuminate\Http\Request;

class ProfileController extends Controller
{   
    public function index()
    {
        $data['shouts'] = ShoutBox::orderBy('id', 'desc')->limit(20)->get();
        $data['lastShoutID'] = ShoutBox::select('id')->orderBy('id', 'desc')->first();
        $data['lastShoutID'] = $data['lastShoutID']->id;

        // return $data;
        return view('backend.profile.index', $data);
    }
}
