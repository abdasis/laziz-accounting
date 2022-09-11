<?php

namespace App\Http\Livewire\Sales;

use App\Models\Sales;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Component;

class Invoices extends Component
{
    public $sales;
    public function mount(Sales $sales)
    {
        $this->sales = $sales;
        Debugbar::info($sales);

    }
    public function render()
    {
        return view('livewire.sales.invoices');
    }
}
