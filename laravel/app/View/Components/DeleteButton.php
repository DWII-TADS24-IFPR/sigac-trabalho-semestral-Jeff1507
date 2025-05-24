<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteButton extends Component
{
    /**
     * Create a new component instance.
     */
    public string $action;
    public ?string $class;
    public ?string $confirm;
    public function __construct(string $action, ?string $class = null, ?string $confirm = null)
    {
        $this->action = $action;
        $this->class = $class;
        $this->confirm = $confirm;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.delete-button');
    }
}
