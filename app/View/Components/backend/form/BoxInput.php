<?php

namespace App\View\Components\backend\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BoxInput extends Component
{
    public $range;
    public $value;
    /**
     * Create a new component instance.
     */
    public function __construct($range, $value = null)
    {
        $this->range = $range;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.form.box-input');
    }
}
