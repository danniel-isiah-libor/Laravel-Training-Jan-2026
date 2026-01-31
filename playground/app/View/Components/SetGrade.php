<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SetGrade extends Component
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
        // $color = match ($this->grade) {
        //     'Failed' => 'red',
        //     'Passed' => 'orange',
        //     'Good' => 'blue',
        //     'Excellent' => 'green',
        //     default => 'black',
        // };

        switch ($this->grade) {
            case 'Failed':
                $color = 'red';
                break;
            case 'Passed':
                $color = 'orange';
                break;
            case 'Good':
                $color = 'blue';
                break;
            case 'Excellent':
                $color = 'green';
                break;
            default:
                $color = 'black';
        }

        return view('components.set-grade', [
            'grade' => $this->grade,
            'color' => $color,
        ]);
    }
}
