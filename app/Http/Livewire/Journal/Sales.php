<?php

namespace App\Http\Livewire\Journal;

use App\Models\Journal;
use Livewire\Component;

class Sales extends Component
{
    public function render()
    {
        return view('livewire.sales',[
            'journals' => Journal::query()->get(),
//            'journals' => Journal::query()->where('type', 'sales')->get()
        ]);
    }
}
