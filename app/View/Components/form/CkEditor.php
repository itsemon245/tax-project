<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CkEditor extends Component
{
    public $hasImage;
    /**
     * Create a new component instance.
     */
    public function __construct($hasImage = false)
    {
        $this->hasImage = $hasImage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.ck-editor');
    }
}
