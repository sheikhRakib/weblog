<?php

namespace App\Http\Controllers;

use App\Models\ShoutBox;

class ProfileController extends Controller
{   
    public function index() {
        $data['shouts'] = ShoutBox::orderBy('id', 'desc')->limit(20)->get()->map(function($shout){
            $shout->time = $shout->created_at->format('M d \a\t h:i A');
            return $shout;
        });
        $data['lastShoutID'] = ShoutBox::select('id')->orderBy('id', 'desc')->first();
        $data['lastShoutID'] = $data['lastShoutID']->id;

        // return $data;
        return view('backend.profile.index', $data);
    }
}
