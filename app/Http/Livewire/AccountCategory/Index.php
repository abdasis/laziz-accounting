<?php

namespace App\Http\Livewire\AccountCategory;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;
    public $update = false;
    public $accountCategory;

    protected $listeners = [
        'edit' => 'handleEdit',
        'categoryUpdated' => 'handleUpdatedCategory',
        'categoryCreated' => 'handleCategoryCreated',
    ];

    public function handleCategoryCreated()
    {
        $this->alert('success', 'Berhasil', [
            'text'=>'Kategori akun berhasil ditambahkan',
        ]);
        $this->reset();
    }

    public function handleUpdatedCategory()
    {

        $this->alert('success', 'Berhasil', [
            'text'=>'Kategori akun berhasil diperbarui',
        ]);
        $this->reset();
    }

    public function handleEdit($data)
    {
        $this->update = true;
        $this->accountCategory = $data;
        $this->dispatchBrowserEvent('showModal');
    }
    public function close()
    {
        return $this->reset();
    }
    public function render()
    {
        return view('livewire.account-category.index');
    }
}
