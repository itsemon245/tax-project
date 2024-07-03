<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Selectize extends Component {
    public $canCreate;

    /**
     * Create a new component instance.
     */
    public function __construct($canCreate = true) {
        $this->canCreate = $canCreate;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('components.form.selectize');
    }
}
