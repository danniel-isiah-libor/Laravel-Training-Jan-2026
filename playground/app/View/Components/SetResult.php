<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SetResult extends Component
{
    private $result;
    /**
     * Create a new component instance.
     */
    public function __construct($result)
    {
        $this->result = $result;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $color = match ($this->result) {
            'FAILED!' => 'red',
            'PASSED!' => 'orange',
            'GOOD!' => 'blue',
            'EXCELLENT!' => 'green',
            default => 'black',
        };

        return view('components.set-result', [
            'result' => $this->result,
            'color' => $color,
        ]);
    }
}
