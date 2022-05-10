<?php

namespace App\Http\Livewire\Pages\Cost;

use App\Models\Cost;
use Livewire\Component;

class Show extends Component
{
    public $cost;
    public function mount(Cost $cost)
    {
        $this->cost = $cost;
    }
    public function render()
    {
        return view('livewire.pages.cost.show');
    }
}
