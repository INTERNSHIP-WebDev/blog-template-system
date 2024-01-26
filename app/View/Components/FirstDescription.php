<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FirstDescription extends Component
{
    /**
     * Create a new component instance.
     */
    public $desc;
    public $first;
    public $rest;
    public function __construct($desc)
    {
        $first = substr($desc, 0, 1);
        $rest = substr($desc, 1);
        $this->desc = $desc;
        $this->first = $first;
        $this->rest = $rest;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.first-description');
    }
}
