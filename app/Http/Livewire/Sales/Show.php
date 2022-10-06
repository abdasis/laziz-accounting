<?php

namespace App\Http\Livewire\Sales;

use App\Models\Payment;
use App\Models\Sales;
use App\Traits\DeleteConfirm;
use Livewire\Component;

class Show extends Component
{
    use DeleteConfirm;

    public $sales;
    public $purchase, $total, $ppn = [], $subtotal, $pph, $grand_total;
    public $total_payment;
    public $payments = [];

    protected $listeners = [
        'confirmed' => 'handleDelete',
        'handleDeletePayment' => 'handleDeletePayment',
        'refreshPayment' => 'handleRefreshPayment',
    ];

    public function handleRefreshPayment($payment)
    {
        return $this->mount($this->sales);
    }

    public function handleDelete()
    {
        if ($this->model_id){
            $sales = Sales::find($this->model_id);
            $sales->journal->details()->delete();
            $sales->journal()->delete();
            $sales->delete();
            $this->alert('success', 'Berhasil', [
                'text' => 'Data berhasil dihapus'
            ]);

        }else{
            $this->alert('error', 'Kesalahan', [
                'text' => 'Data tidak ditemukan'
            ]);
        }
    }

    public function deletePayment($id)
    {
        $this->confirm( 'Yakin hapus data ini?', [
            'text' => 'Data yang dihapus tidak dapat dikembalikan',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Ya, hapus',
            'onConfirmed' => 'handleDeletePayment',
            'allowOutsideClick' => false,
            'timer' => null,
            'iconHtml' => '<img class="img-fluid" src="/assets/icons/confirm.png"/>',
            'customClass' => [
                'icon' => 'border-warning'

            ],
        ]);
        $this->payment_id = $id;
    }

    public function handleDeletePayment()
    {
        $payment = Payment::find($this->payment_id);
        if ($payment){
            $payment->journal->details()->delete();
            $payment->journal()->delete();
            $payment->delete();
            $this->alert('success', 'Berhasil', [
                'text' => 'Data berhasil dihapus'
            ]);
            $this->emit('refreshPayment', $payment);
        }else{
            $this->alert('error', 'Kesalahan', [
                'text' => 'Data tidak ditemukan'
            ]);
        }
    }

    public function mount(Sales $sale)
    {
        $this->sales = $sale;
        $this->total = $sale->details->sum('total');
        foreach ($sale->details as $key => $detail){
            $this->ppn[$key] = $detail->total * $detail->tax / 100;
        }
        $this->subtotal = $this->total + collect($this->ppn)->sum();
        $this->pph = $this->subtotal * (int) $sale->income_tax / 100;
        $this->grand_total = $this->subtotal - $this->pph;
        $this->total_payment = $sale->totalPaid();
        $this->payments = $sale->payments;
    }

    public function render()
    {
        return view('livewire.sales.show');
    }
}
