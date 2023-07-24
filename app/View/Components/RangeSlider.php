<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RangeSlider extends Component
{
    public $from;
    public $to;
    public $id;
    public $label;
    public $name;
    public $step;
    public $icon;
    public $tooltips;
    /**
     * Create a new component instance.
     */
    public function __construct($from = 0, $to = 100, $step = 1, $id = "slider", $label = "Slider", $name = "slider", $icon = '', $tooltips = '')
    {
        $this->from = $from;
        $this->to = $to;
        $this->step = $step;
        $this->id = $id;
        $this->label = $label;
        $this->name = $name;
        $this->icon = $icon;
        $this->tooltips = $tooltips;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.range-slider');
    }
}
