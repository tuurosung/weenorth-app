<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormWizard3 extends Component
{
    public array $steps;
    public string $activeStep;

    /**
     * Create a new component instance.
     */
    public function __construct(
        array $steps = [],
        string $activeStep = 'step1'
    ) {
        // Default 3-step configuration if no steps provided
        $this->steps = empty($steps) ? [
            [
                'id' => 'step1',
                'title' => 'Step 1',
                'description' => 'Basic Information',
                'active' => true
            ],
            [
                'id' => 'step2',
                'title' => 'Step 2',
                'description' => 'Additional Details',
                'active' => false
            ],
            [
                'id' => 'step3',
                'title' => 'Step 3',
                'description' => 'Final Information',
                'active' => false
            ]
        ] : $steps;

        $this->activeStep = $activeStep;

        // Set active state based on activeStep
        foreach ($this->steps as &$step) {
            $step['active'] = $step['id'] === $this->activeStep;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.form-wizard3');
    }
}
