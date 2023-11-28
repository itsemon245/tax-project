<?php

namespace App\View\Components\frontend\layouts;

use App\Interfaces\Services\SettingInterface;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Head extends Component
{
    public ?string $favicon;
    /**
     * Create a new component instance.
     */
    public function __construct(?string $favicon = null)
    {
        $this->favicon = $favicon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render() : View|Closure|string
    {
        return view('components.frontend.layouts.head');
    }
}
