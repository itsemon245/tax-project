<?php

namespace App\View\Components\backend\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BoxInput extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $range,
        public $value = null,
        public $hasSpace = false
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.form.box-input');
    }
}
