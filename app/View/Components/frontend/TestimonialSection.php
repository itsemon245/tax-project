<?php

namespace App\View\Components\frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TestimonialSection extends Component
{
    public $testimonials;
    /**
     * Create a new component instance.
     */
    public function __construct($testimonials)
    {
        $this->testimonials = $testimonials;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.testimonial-section');
    }
}
