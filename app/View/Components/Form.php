<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $competition, $i, $k, $prices;
    
    public function __construct($competition, $i, $k, $prices)
    {
        $this->competition = $competition;
        $this->i = $i;
        $this->k = $k;
        $this->prices = $prices;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form');
    }
}
