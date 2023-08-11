<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AvgReviewStars extends Component
{
    public $avg;
    /**
     * Create a new component instance.
     */
    public function __construct($avg = 0)
    {
        $this->avg = $avg;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.avg-review-stars');
    }
}
