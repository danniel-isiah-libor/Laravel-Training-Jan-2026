<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserData extends Component
{
    // Make properties public so Blade can access them directly
    public $label;
    public $value;

    /**
     * Create a new component instance.
     */
    public function __construct($label, $value)
    {
        $this->label = $label;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.user-data');
    }
}