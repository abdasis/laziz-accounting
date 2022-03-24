<?php

namespace App\Http\Livewire\Pages\Cost;

use App\Models\Account;
use App\Models\Journal;
use Livewire\Component;

class Create extends Component
{

    public $memo, $amount, $account_id;

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
        $number = now()->format('Ymd') . $last_transaction+1;
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
    }

    public function render()
    {
        return view('livewire.pages.cost.create',[
            'accounts' => Account::latest()->get()
        ]);
    }
}
