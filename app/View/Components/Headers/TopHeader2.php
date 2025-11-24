<?php

namespace App\View\Components\Headers;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopHeader2 extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = ''
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.headers.top-header2');
    }
}
