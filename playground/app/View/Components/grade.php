<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class grade extends Component
{
    private $grade;
    /**
     * Create a new component instance.
     */
    public function __construct($grade)
    {
        $this->grade = $grade;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $output = '';
        if ($this->grade < 75) {
            $output = "<h1 style='color: red'> Failed </h1>";
        } else if ($this->grade >= 75 && $this->grade < 80) {
            $output = "<h1 style='color: yellow'> Passed </h1>";
        } else if ($this->grade >= 80 && $this->grade < 95) {
            $output = "<h1 style='color: blue'> Good </h1>";
        } else {
            $output = "<h1 style='color: green'> Excellent </h1>";
        }
        return view('components.grade', ['grade' => $output]);
    }
}
