<?php

namespace App\View\Components\frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InfoCard extends Component {
    public $info;

    /**
     * Create a new component instance.
     */
    public function __construct($info) {
        $this->info = $info;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('components.frontend.info-card');
    }
}
