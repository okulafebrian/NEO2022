<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RegistrationStatus extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $registration, $status;   

    public function __construct($registration, $status)
    {
        $this->registration = $registration;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.registration-status');
    }
}
