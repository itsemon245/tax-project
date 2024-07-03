<?php

namespace App\View\Components\backend\ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component {
    public $type;
    public $action;

    /**
     * Create a new component instance.
     */
    public function __construct($action = '', $type = 'submit') {
        $this->type = $type;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('components.backend.ui.button');
    }
}
