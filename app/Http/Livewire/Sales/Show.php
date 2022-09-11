<?php

namespace App\Http\Livewire\Sales;

use App\Models\Sales;
use Livewire\Component;

class Show extends Component
{

    public $sales;
    public $purchase, $total, $ppn, $subtotal, $pph, $grand_total;

    public function mount(Sales $sale)
    {
        $this->sales = $sale;

        $this->total = $sale->details->sum('total');
        $this->ppn = $sale->details->sum('total') * $sale->details->sum('tax') / 100;
        $this->subtotal = $this->total + $this->ppn;
        $this->pph = $this->subtotal * (int) $sale->income_tax / 100;
        $this->grand_total = $this->subtotal - $this->pph;

    }

    public function render()
    {
        return view('livewire.sales.show');
    }
}
