<?php

namespace App\View\Components\Section;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CustomService extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $customServices = []
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.section.custom-service');
    }
}
