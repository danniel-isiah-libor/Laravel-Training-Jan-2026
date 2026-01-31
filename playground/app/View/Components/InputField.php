<?php
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputField extends Component
{
    private $firstName, $lastName;
    /**
     * Create a new component instance.
     */
    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View | Closure | string
    {
        $fullName = $this->firstName . ' ' . $this->lastName;
        $fullName = strtoupper($fullName);

        return view('components.input-field', ['fullName' => $fullName]);
    }
}
