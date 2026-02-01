<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserData extends Component
{
    private $label, $value;
<<<<<<< HEAD
=======

>>>>>>> 49d2a3351118769ba4c914b03815f1ea8256cc12
    /**
     * Create a new component instance.
     */
    public function __construct($label, $value)
    {
<<<<<<< HEAD
        //
=======
>>>>>>> 49d2a3351118769ba4c914b03815f1ea8256cc12
        $this->label = $label;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
<<<<<<< HEAD
        return view('components.user-data', ['label' => $this->label, 'value' => $this->value]);
=======
        return view('components.user-data', [
            'label' => $this->label,
            'value' => $this->value,
        ]);
>>>>>>> 49d2a3351118769ba4c914b03815f1ea8256cc12
    }
}
