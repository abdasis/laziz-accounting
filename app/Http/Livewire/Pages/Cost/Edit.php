<?php

namespace App\Http\Livewire\Pages\Cost;

use App\Models\Account;
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
    public function render()
    {
        return view('livewire.pages.cost.edit',[
            'accounts' => Account::where('account_type', 'kas')
                ->where('lock_status', 'unlocked')
                ->get(),
            'account_debets' => Account::where('account_type', 'umum')
                ->where('lock_status', 'unlocked')
                ->get()
        ]);
    }
}
