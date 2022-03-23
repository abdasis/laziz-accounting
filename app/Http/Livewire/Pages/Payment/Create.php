<?php

namespace App\Http\Livewire\Pages\Payment;

use App\Models\Account;
use App\Models\Payment;
use App\Models\Purchase;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    public $purchase;

    public $payment_method, $payment_date, $amount, $notes, $account_potongan, $total_discount;
    public $title_potongan, $credit_account;

    public function mount(Purchase $purchase)
    {
        $this->purchase = $purchase;
    }

    public function updatedAccountPotongan($value)
    {
        $this->title_potongan = Account::find($value)->name;
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function rules()
    {
        return[
            'amount.0' => 'required|numeric|max:'.$this->purchase->details->sum('total'),
            'amount.*' => 'required|numeric|max:'.$this->purchase->details->sum('total'),
            'credit_account' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'amount.0.required' => 'Jumlah pembayaran harus diisi',
            'amount.*.required' => 'Jumlah pembayaran harus diisi',
            'amount.0.max' => 'Tidak boleh melebihi dari total pembelian',
            'amount.*.max' => 'Tidak boleh melebihi dari total pembelian',
        ];
    }
    public function store()
    {
        $this->validate();

        Payment::create([
            'purchase_id' => $this->purchase->id,
            'payment_method' => $this->payment_method,
            'payment_date' => $this->payment_date ?? now()->format('Y-m-d'),
            'amount' => collect($this->amount)->sum(),
            'notes' => $this->notes,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        /*selanjutnya membuat fitur untuk menyimpannya ke journal*/

        $this->flash('success', 'Berhasil', [
            'text' =>   'Pembayaran berhasil ditambahkan',
        ], route('purchases.show', $this->purchase->id));

    }


    public function render()
    {
        return view('livewire.pages.payment.create',[
            'accounts' => Account::all()
        ]);
    }
}
