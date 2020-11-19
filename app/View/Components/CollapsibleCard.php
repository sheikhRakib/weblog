<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CollapsibleCard extends Component
{
    public $title;
    public $collapse;

    public function __construct($title, $collapse='')
    {
        $this->title = $title;
        $this->collapse = $collapse;
    }

    public function render()
    {
        return view('components.collapsible-card');
    }
}
