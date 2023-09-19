<?php

namespace App\View\Components\backend\table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\Paginator;
use Illuminate\View\Component;

class Basic extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Paginator|string $items
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.table.basic');
    }
}
