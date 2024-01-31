<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TagCheckbox extends Component
{
    /**
     * The selected tags for the checkbox component.
     *
     * @var array
     */
    
    public $selectedTags;

    /**
     * Create a new component instance.
     *
     * @param  array  $selectedTags
     * @return void
     */
    public function __construct(array $selectedTags)
    {
        $this->selectedTags = $selectedTags;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.tag-checkbox');
    }
}
