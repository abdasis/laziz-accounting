<?php

namespace App\Http\Livewire\Pages\Account;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;

    public $update = false;

    public $account;

    protected $listeners = [
        'accountUpdated' => 'handleAccountUpdated',
        'accountCreated' => 'handleAccountCreated',
        'edit' => 'handleEdit',
    ];

    public function handleAccountCreated()
    {
        $this->emit('refresh');
        $this->alert('success', 'Berhasil', [
            'text'=> 'Data berhasil ditambahkan',
        ]);
        $this->emitTo(Table::class, 'refresh');
    }

    public function handleAccountUpdated()
    {
        $this->emit('refresh');
        $this->alert('success', 'Berhasil', [
            'text'=> 'Data akun berhasil di perbarui',
        ]);
    }

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
