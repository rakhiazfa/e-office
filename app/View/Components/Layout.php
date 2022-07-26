<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * @var string
     */
    public string $title;

    /**
     * Create a new component instance.
     * 
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout');
    }
}
