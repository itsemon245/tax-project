<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Calendar extends Component {
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $currentEvents = [],
        public $events = [],
        public $services = [],
        public $clients = [],
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('components.ui.calendar');
    }
}
