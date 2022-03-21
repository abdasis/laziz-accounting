<?php

namespace App\Http\Livewire\Pages\Purchase;

use App\Models\Purchase;
use App\Traits\DeleteConfirm;
use Dflydev\DotAccessData\Data;
use Livewire\Component;

class Show extends Component
{

    use DeleteConfirm;

    protected $listeners = ['confirmed' => 'deletePurchase'];

    public function deletePurchase()
    {
        if ($this->model_id){
            Purchase::find($this->model_id)->delete();
            $this->flash('success', 'Berhasil',[
                'text' => 'Data berhasil dihapus',
            ], route('purchases.index'));
        }else{
            $this->alert('error', 'Gagal',[
                'text' => 'Data gagal dihapus',
            ]);
        }
    }

    public $purchase, $total, $ppn, $subtotal, $pph, $grand_total;


    public function mount($purchase)
    {
        $purchase = Purchase::find($purchase);
        $this->purchase = $purchase;
        $this->total = $this->purchase->details->sum('total');
        $this->ppn = $purchase->details->sum('total') * $purchase->details->sum('tax') / 100;
        $this->subtotal = $this->total + $this->ppn;
        $this->pph = $this->subtotal * $purchase->income_tax / 100;
        $this->grand_total = $this->subtotal - $this->pph;
    }
    public function render()
    {
        return view('livewire.pages.purchase.show');
    }
}
