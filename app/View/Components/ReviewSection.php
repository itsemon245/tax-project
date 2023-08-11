<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ReviewSection extends Component
{
    public $reviews;
    public $item;
    public $slug;
    /**
     * Create a new component instance.
     */
    public function __construct($reviews, $item, $slug)
    {
        $this->reviews = $reviews;
        $this->item = $item;
        $this->slug = $slug;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.review-section');
    }
}
