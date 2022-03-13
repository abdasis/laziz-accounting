<?php

namespace App\Http\Livewire\Pages\Employee;

use Livewire\Component;

class Index extends Component
{
    public $update = false;


    public function render()
    {
        return view('livewire.pages.employee.index');
    }
}
