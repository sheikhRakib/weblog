<?php

namespace App\View\Components\Profile;

use Illuminate\View\Component;

class ShoutBox extends Component
{
    public $shouts;
    public $lastShoutID;

    public function __construct($shouts, $lastShoutID)
    {
        $this->shouts = $shouts;
        $this->lastShoutID = $lastShoutID;
    }

    public function render()
    {
        return view('components.profile.shout-box');
    }
}
