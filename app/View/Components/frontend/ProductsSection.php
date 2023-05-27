<?php

namespace App\View\Components\frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductsSection extends Component
{
    public $subCategories;
    /**
     * Create a new component instance.
     */
    public function __construct($subCategories)
    {
        $this->subCategories = $subCategories;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.products-section');
    }
}
