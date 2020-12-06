<?php

namespace App\Http\Controllers;

use App\Models\ShoutBox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoutBoxController extends Controller
{
    public function sendShouts(Request $request)
    {
        $this->validate($request, [
            'message' => ['required', 'string',],
        ]);
        
        $shout              = new ShoutBox();
        $shout->sender_id   = Auth::id();
        $shout->message     = $request['message'];
        $shout->save();
        
        return response()->json([
            'success' => 'message sent',    
        ]);
    }

    public function getShouts(Request $request)
    {
        $lsID       = $request['lsID'];
        $shoutID    = ShoutBox::select('id')->orderBy('id', 'desc')->first();
        $shoutID    = $shoutID->id;
        $shouts     = ShoutBox::where('id', '>', $lsID)->orderBy('id', 'desc')->get();
        $shouts     = ShoutBox::join('users', 'users.id', '=', 'shout_boxes.sender_id')
        ->select('users.name', 'shout_boxes.message', 'shout_boxes.created_at')
        ->where('shout_boxes.id', '>', $lsID)
        ->get()
        ->map(function($shout){
            $shout->time = $shout->created_at->format('M d \a\t h:i A');
            return $shout;
        })->forget('shout_boxes.created_at');
        
        return response()->json([
            'shouts'  => $shouts,
            'shoutID' => $shoutID,
        ]);
    }
}
