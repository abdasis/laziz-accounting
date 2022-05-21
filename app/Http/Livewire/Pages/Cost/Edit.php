<?php

namespace App\Http\Livewire\Pages\Cost;

use App\Models\Account;
use App\Models\Cost;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{

    use LivewireAlert;

    public $memo, $account_id;

    public $amount, $total;

    public $credit_account, $transaction_date, $code, $description, $notes;

    public $inputs = [];
    public $i = 1;

    public function mount(Cost $cost)
    {
        $this->transaction_date = Carbon::parse($cost->transaction_date)->format('Y-m-d');
        $this->code = $cost->code;
        $this->description = $cost->description;
        $this->notes = $cost->notes;

        //1. mengambil data journal dari transaksi
        $journal = $cost->journal;

        //mengambil data akun credit
        $credit = $journal->details()->where('credit', '!=', 0)->first();

        $this->credit_account = $credit->account_id;

        //mengambil data akun debet
        $account_debets = $journal->details()->where('credit', '=', 0)->get();

        //menampilkan detail pembelian
        foreach ($account_debets as $key => $account_debet) {
            $this->account_id[$key] = $account_debet->account_id;
            $this->memo[$key] = $account_debet->memo;
            $this->amount[$key] = $account_debet->debit;
        }
        $this->total = collect($this->amount)->sum();


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

    public function update()
    {

    }

    public function render()
    {
        return view('livewire.pages.cost.edit', [
            'accounts' => Account::where('account_type', 'kas')
                ->where('lock_status', 'unlocked')
                ->get(),
            'account_debets' => Account::where('account_type', 'umum')
                ->where('lock_status', 'unlocked')
                ->get()
        ]);
    }
}
