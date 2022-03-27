<?php

namespace App\Http\Livewire\Pages\Journal;

use App\Models\Journal;
use Livewire\Component;

class Purchase extends Component
{
    public function render()
    {
        return view('livewire.pages.journal.purchase',[
            'journals' => Journal::where('type','purchase')->get()
        ]);
    }
}
