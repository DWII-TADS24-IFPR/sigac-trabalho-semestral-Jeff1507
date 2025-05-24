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
    public string $modalId;
    public function __construct(string $action, string $modalId)
    {
        $this->action = $action;
        $this->modalId = $modalId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.delete-button')->with(['modalId'=>$this->modalId]);
    }
}
