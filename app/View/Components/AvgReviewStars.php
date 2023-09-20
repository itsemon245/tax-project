<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AvgReviewStars extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $avg = 0, public $iconFont = 'font-16')
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.avg-review-stars');
    }
}
