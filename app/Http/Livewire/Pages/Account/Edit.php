<?php

namespace App\Http\Livewire\Pages\Account;

use App\Models\Account;
use App\Models\AccountCategory;
use Livewire\Component;

class Edit extends Component
{
    public function mount($account)
    {
    }
    public function render()
    {
        return view('livewire.pages.account.edit',[
            'account_categories' => AccountCategory::orderBy('name', 'asc')->get(),
            'accounts' => Account::orderBy('name', 'asc')->get(),
        ]);
    }
}
