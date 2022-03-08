<?php

namespace App\Http\Livewire\Pages\Account;

use Livewire\Component;

class Index extends Component
{
    public $update = false;

    public $account;

    protected $listeners = [
        'accountUpdated' => 'handleAccountUpdated',
        'accountCreated' => 'handleAccountCreated',
        'edit' => 'handleEdit',
    ];

    public function handleEdit($account)
    {
        $this->update = true;
        $this->account = $account;
        $this->dispatchBrowserEvent('showModal');
    }

    public function close()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.pages.account.index');
    }
}
