<?php

namespace App\View\Components\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SingleMenuItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $menuIcon = 'angle-right',
        public $menuText = 'Menu Item'
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar.single-menu-item');
    }
}
