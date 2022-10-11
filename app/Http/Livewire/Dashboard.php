<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $quotes = \Http::get('https://type.fit/api/quotes')->collect();
        return view('livewire.dashboard',[
            'quotes' => $quotes->random()['text'],
        ]);
    }
}
