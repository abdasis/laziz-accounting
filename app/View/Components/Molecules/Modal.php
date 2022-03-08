<?php

namespace App\View\Components\Molecules;

use Illuminate\View\Component;

class Modal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $target;
    public $title;
    public $title_id;
    public function __construct($target = 'modal', $title = '', $title_id = 'Modal')
    {
        $this->target = $target;
        $this->title = $title;
        $this->title_id = $title_id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.molecules.modal');
    }
}
