<?php

namespace App\Http\Livewire\Journal;

use App\Models\Journal;
use Livewire\Component;

class Purchase extends Component
{
    public function render()
    {
        return view('livewire.journal.purchase',[
            'journals' => Journal::where('type','purchase')->get()
        ]);
    }
}
