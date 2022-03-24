<?php

namespace App\Http\Livewire\Pages\Account;

use App\Models\Account;
use Livewire\Component;

class Show extends Component
{

    public $account;
    public function mount(Account $account)
    {
        $this->account = $account;
    }
    public function render()
    {
        return view('livewire.pages.account.show');
    }
}
