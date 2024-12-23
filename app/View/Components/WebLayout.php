<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WebLayout extends Component
{
    public $title;
    public function __construct($title = null)
    {
        $this->title = $title ?? 'Logitics-systemm';
    }

    public function render()
    {
        return view('theme.web.main');
    }
}
