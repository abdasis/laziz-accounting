<?php

namespace App\Http\Livewire\Sales;

use App\Models\Sales;
use Barryvdh\Debugbar\Facades\Debugbar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class Invoices extends Component
{
    public $sales;
    public $format;
    public $tanda_tangan;

    public function mount(Sales $sales)
    {
        $this->sales = $sales;
    }

    public function render()
    {
        return view('livewire.sales.invoices');
    }
}
