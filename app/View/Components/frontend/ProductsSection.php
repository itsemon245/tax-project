<?php

namespace App\View\Components\frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductsSection extends Component
{
    public $productCategory;
    /**
     * Create a new component instance.
     */
    public function __construct($productCategory)
    {
        $this->productCategory = $productCategory;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.products-section');
    }
}
