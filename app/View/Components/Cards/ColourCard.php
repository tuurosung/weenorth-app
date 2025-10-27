<?php

namespace App\View\Components\Cards;

use Closure;
use Illuminate\Support\Number;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

use function PHPUnit\Framework\isNan;

class ColourCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $icon = 'chart-simple',
        public string $label = '',
        public string $value = '',
        public string $valueType = 'number',
        public string $colour = 'primary'
    )
    {
        $this->value = $this->prepValue();
    }


    private function prepValue()
    {
        if ($this->value === '') {
            return 0;
        }

        return $this->valueType === 'currency' ? 'GHS ' . Number::format($this->value, 2) : Number::format($this->value, 0  );
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.colour-card');
    }
}
