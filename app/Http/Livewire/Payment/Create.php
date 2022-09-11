<?php

namespace App\Http\Livewire\Payment;

use App\Models\Account;
use App\Models\JournalDetail;
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
        foreach ($purchase->details as $key => $detail) {
            $this->amount[$key] = $detail->total;
        }
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

        try {
            \DB::beginTransaction();


            $payment = Payment::create([
                'purchase_id' => $this->purchase->id,
                'payment_method' => $this->payment_method,
                'payment_date' => $this->payment_date ?? now()->format('Y-m-d'),
                'amount' => collect($this->amount)->sum(),
                'notes' => $this->notes,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);

            /*selanjutnya membuat fitur untuk menyimpannya ke journal*/
            $contact = $this->purchase->supplier;

            /*membuat code*/
            $code = 'PY-'.now()->format('ymd').str_pad($this->purchase->id, 3, '0', STR_PAD_LEFT);

            $journal = $contact->journals()->create([
                'code' => $code,
                'transaction_date' => $this->payment_date ?? now()->format('Y-m-d'),
                'name' => 'Pembayaran '.$this->purchase->code,
                'description' => 'Pembayaran pembelian '.$this->purchase->code,
                'notes' => $this->notes,
                'total' => collect($this->amount)->sum(),
                'status' => 'draft',
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);

            $details = [];

            /*membuat detail journal*/
            foreach ($this->amount as $key => $value) {
                $details[] = new JournalDetail([
                    'journal_id' => $journal->id,
                    'account_id' => $this->purchase->details[$key]->product->purchase_account,
                    'debit' => $value,
                    'credit' => 0,
                    'memo' => "Pembayaran {$this->purchase->details[$key]->description}"
                ]);
            }

            $details[] = new JournalDetail([
                'journal_id' => $journal->id,
                'account_id' => $this->credit_account,
                'debit' => 0,
                'credit' => collect($this->amount)->sum(),
                'memo' => "Pembayaran Pembelian {$this->purchase->code}"
            ]);

            $journal->details()->saveMany($details);

            $this->purchase->update([
                'status' => 'dibayar',
                'updated_by' => auth()->user()->id,
            ]);


            $this->flash('success', 'Berhasil', [
                'text' =>   'Pembayaran berhasil ditambahkan',
            ], route('purchases.show', $this->purchase->id));

            \DB::commit();

        }catch (\Exception $e) {
            \DB::rollBack();
            $this->flash('error', 'Gagal', [
                'text' =>   'Pembayaran gagal ditambahkan',
            ]);
        }
    }


    public function render()
    {
        return view('livewire.payment.create',[
            'accounts' => Account::where('lock_status', 'unlocked')->get(),
        ]);
    }
}
