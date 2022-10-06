<?php

namespace App\Http\Livewire\Payment;

use App\Models\Account;
use App\Models\JournalDetail;
use App\Models\Payment;
use App\Models\Sales;
use DB;
use Exception;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    public $sales;
    public $payment_method, $payment_date, $amount, $notes, $account_potongan, $total_discount;
    public $title_potongan, $credit_account;
    public $account;
    public $description;

    public function mount($id)
    {
        $sales = Sales::find($id);
        $this->payment_date = now()->format('Y-m-d');
        $total_penjualan = $sales->details()->sum('total');
        $ppn = $sales->details()->sum('total') * $sales->details()->sum('tax') / 100;
        $this->amount = $total_penjualan + $ppn - $sales->totalPaid();
        $this->sales = $sales;
    }

    public function rules()
    {
        return[
            'payment_date' => 'required',
            'account' => 'required',
            'description' => 'required',
        ];
    }

    public function updatedAccountPotongan($value)
    {
        $this->title_potongan = Account::find($value)->name;
    }

    public function store()
    {
        $this->validate();
        try {
            DB::beginTransaction();

            $payment = Payment::create([
                'paymentable_id' => $this->sales->id,
                'paymentable_type' => get_class($this->sales),
                'payment_method' => $this->account,
                'payment_date' => $this->payment_date ?? now()->format('Y-m-d'),
                'amount' => collect($this->amount)->sum(),
                'notes' => $this->description,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);

            $contact = $this->sales->contact;

            $code = 'PY-' . str_pad($payment->id, 8, '0', STR_PAD_LEFT);

            $journal = $contact->journals()->create([
                'code' => $code,
                'transaction_date' => $this->payment_date ?? now()->format('Y-m-d'),
                'name' => 'Pembayaran ' . $code,
                'description' => $this->description,
                'notes' => $this->description,
                'total' => collect($this->amount)->sum(),
                'no_reference' => $payment->id,
                'status' => 'draft',
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,

            ]);

            $details = [];

            array_push($details, new JournalDetail([
                'journal_id' => $journal->id,
                'account_id' => $contact->akun_piutang,
                'contact_id' => $contact->id,
                'debit' => 0,
                'credit' => $this->amount,
                'memo' => $this->description
            ]));

            array_push($details, new JournalDetail([
                'journal_id' => $journal->id,
                'account_id' => $this->account,
                'contact_id' => $contact->id,
                'debit' => $this->amount,
                'credit' => 0,
                'memo' => $this->description
            ]));

            $journal->details()->saveMany($details);

            $this->flash('success', 'Berhasil', [
                'text' => 'Pembayaran berhasil ditambahkan',
            ], route('sales.show', $this->sales->id));

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
        }
    }


    public function render()
    {
        return view('livewire.payment.create', [
            'accounts' => Account::where('lock_status', 'unlocked')->get(),
        ]);
    }
}
