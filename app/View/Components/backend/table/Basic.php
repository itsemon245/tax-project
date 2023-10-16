<?php

namespace App\View\Components\backend\table;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class Basic extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Paginator|LengthAwarePaginator|string $items
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
