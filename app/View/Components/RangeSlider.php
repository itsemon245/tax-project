<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RangeSlider extends Component {
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $from = 0,
        public $to = 100,
        public $step = 1,
        public $id = 'slider',
        public $label = 'Slider',
        public $name = 'slider',
        public $tooltips = '',
        public $icon = '',
        public $isDropdown = false,
        public $minValue = null,
        public $maxValue = null
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('components.range-slider');
    }
}
