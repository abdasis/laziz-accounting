<?php

namespace App\Http\Livewire\Payment;

use App\Models\Account;
use App\Models\Journal;
use App\Models\JournalDetail;
use App\Models\Payment;
use App\Models\Sales;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{

    use LivewireAlert;

    public $sales;
    public $payment_method;
    public $payment_date;
    public $amount;
    public $notes;
    public $account_potongan;
    public $total_discount;
    public $title_potongan, $credit_account;
    public $account;
    public $description;

    public function mount(Payment $payment)
    {
        $this->payment_date = Carbon::parse($payment->payment_date)->format('Y-m-d');
        $this->amount = $payment->amount;
        $this->description = $payment->notes;
        $this->payment_id = $payment->id;
        $this->account = $payment->payment_method;
    }

    public function rules()
    {
        return [
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
            \DB::beginTransaction();

            $payment = Payment::find($this->payment_id);

            if ($payment){
                $payment->update([
                    'payment_method' => $this->account,
                    'payment_date' => $this->payment_date ?? now()->format('Y-m-d'),
                    'amount' => collect($this->amount)->sum(),
                    'notes' => $this->description,
                    'updated_by' => auth()->user()->id,
                ]);
            }

            $journal = Journal::where('no_reference', $payment->id)->first();

            if ($journal){
                $journal->update([
                    'transaction_date' => $this->payment_date ?? now()->format('Y-m-d'),
                    'description' => $this->description,
                    'notes' => $this->description,
                    'total' => collect($this->amount)->sum(),
                    'status' => 'draft',
                    'updated_by' => auth()->user()->id,
                ]);
            }

            $details = [];

            $contact = $payment->paymentable->contact;

            array_push($details, new JournalDetail([
                'journal_id' => $journal->id,
                'account_id' => $contact->akun_piutang,
                'debit' => 0,
                'credit' => $this->amount,
                'memo' => $this->description
            ]));

            array_push($details, new JournalDetail([
                'journal_id' => $journal->id,
                'account_id' => $this->account,
                'debit' => $this->amount,
                'credit' => 0,
                'memo' => $this->description
            ]));

            $journal->details()->delete();
            $journal->details()->saveMany($details);

            $this->flash('success', 'Berhasil', [
                'text' => 'Pembayaran berhasil ditambahkan',
            ], route('sales.show', $payment->paymentable->id));

            \DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function render()
    {
        return view('livewire.payment.edit', [
            'accounts' => Account::where('lock_status', 'unlocked')->get(),
        ]);
    }
}
