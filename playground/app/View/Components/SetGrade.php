<?php
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SetGrade extends Component
{
    /**
     * Create a new component instance.
     */
    public $grade;
    public function __construct($grade)
    {
        $this->grade = $grade;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View | Closure | string
    {
        $color = match ($this->grade) {
            'Failed'    => 'red',
            'Passed'    => 'yellow',
            'Good'      => 'blue',
            'Excellent' => 'green',
            default     => 'black'
        };
        return view('components.set-grade', [
            'grade' => $this->grade,
            'color' => $color]);
    }
}
