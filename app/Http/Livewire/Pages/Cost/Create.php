<?php

namespace App\Http\Livewire\Pages\Cost;

use App\Models\Account;
use App\Models\Cost;
use App\Models\CostDetail;
use App\Models\Journal;
use App\Models\JournalDetail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{

    use LivewireAlert;
    public $memo, $account_id;
    public $amount, $total;

    public $credit_account, $transaction_date, $code, $description, $notes;
    public $inputs = [];
    public $i = 1;

    protected $rules = [
        'credit_account' => 'required',
        'transaction_date' => 'required',
        'code' => 'required',
        'description' => 'required',


        'account_id.0' => 'required',
        'memo.0' => 'required',
        'amount.0' => 'required|numeric',
    ];

    public function updatedAmount()
    {
        $amount = $this->amount;
        $this->total = collect($amount)->sum();
    }
    public function messages()
    {
        return[
            'credit_account.required' => 'Please select a credit account',
            'transaction_date.required' => 'Please select a transaction date',
            'code.required' => 'Please enter a code',
            'description.required' => 'Please enter a description',
            'account_id.0.required' => 'Please select an account',
            'memo.0.required' => 'Please enter a memo',
            'amount.0.required' => 'Please enter an amount',
        ];
    }

    public function mount()
    {
        $last_transaction = Journal::count();
        $number = now()->format('ymd') . '.' .$last_transaction+1;
        $text = sprintf('BYR-%s', $number);
        $this->code = $text;
    }

    public function addForm($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function removeForm($i)
    {
        unset($this->inputs[$i]);
    }

    public function updated($field)
    {
        $this->validateOnly($field, $this->rules);
    }

    public function store()
    {
        $this->validate();
        try {
            \DB::beginTransaction();

            /*menyimpan data pengeluaran*/
            $cost = Cost::create([
               'code' => $this->code,
               'name' => "Pengeluaran {$this->transaction_date}",
                'transaction_date' => $this->transaction_date,
                'description' => $this->description,
                'notes' => $this->notes,
                'total' => collect($this->amount)->sum(),
                'status' => 'pending',
                'no_reference' => $this->code,
                'created_by' => auth()->user()->id,
            ]);

            $cost_detail = [];
            foreach ($this->account_id as $key => $value){
                $cost_detail[] = new CostDetail([
                    'name' => '-',
                    'description' => $this->memo[$key] . " ketearangan",
                    'amount' => $this->amount[$key],
                ]);
            }
            /*menyimpan detail transaksi*/
            $cost->details()->saveMany($cost_detail);

            /*membuat journal dari pengeluran yang sudah dibuat*/
            $journal = Journal::create([
                'code' => $this->code,
                'name' => '-',
                'transaction_date' => $this->transaction_date,
                'description' => $this->description,
                'notes' => $this->notes,
                'total' => collect($this->amount)->sum(),
                'status' => 'draft',
            ]);

            $details = [];


            foreach ($this->account_id as $key => $value) {
                if (!empty($this->account_id[$key]) && !empty($this->amount[$key])){
                    $details[] = new JournalDetail([
                        'journal_id' => $journal->id,
                        'account_id' => $this->account_id[$key],
                        'debit' => $this->amount[$key],
                        'credit' => 0,
                        'memo' => $this->memo[$key],
                    ]);
                }
            }

            /*pengeluaran untuk akun kas dan bank*/
            $details[] = new JournalDetail([
                'journal_id' => $journal->id,
                'account_id' => $this->credit_account,
                'debit' => 0,
                'credit' => collect($this->amount)->sum(),
                'memo' => $this->notes,
            ]);

            $journal->details()->saveMany($details);

            $this->alert('success', 'Berhasil', [
                'text' => 'Data berhasil disimpan',
            ]);
            \DB::commit();
            $this->reset();
        }catch (\Throwable $e) {
            \DB::rollBack();
            $this->alert('error', 'Gagal', [
                'text' => 'Data gagal disimpan',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.cost.create',[
            'accounts' => Account::where('account_type', 'kas')
                ->where('lock_status', 'unlocked')
                ->get(),
            'account_debets' => Account::where('account_type', 'umum')
                ->where('lock_status', 'unlocked')
                ->get()
        ]);
    }
}
