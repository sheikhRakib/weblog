<?php

namespace App\View\Components\Auth;

use Illuminate\View\Component;

class Input extends Component
{
    public $id; 
    public $type;
    public $icon;
    
    public function __construct($id, $icon='fa-circle', $type='text')
    {
        $this->id   = $id;
        $this->icon = $icon;
        $this->type = $type;
    }

    public function render()
    {
        return view('components.auth.input');
    }
}
