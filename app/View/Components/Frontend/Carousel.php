<?php

namespace App\View\Components\Frontend;

use Illuminate\View\Component;

class Carousel extends Component
{
    public $featured;

    public function __construct($featured)
    {
        $this->featured = $featured;
    }

    public function render()
    {
        return view('components.frontend.carousel', $this->featured);
    }
}
