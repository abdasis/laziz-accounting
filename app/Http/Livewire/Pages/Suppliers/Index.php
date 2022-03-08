<?php

namespace App\Http\Livewire\Pages\Suppliers;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;

    public $update = false;
    public $supplier;

    protected $listeners = [
        'supplierCreated' => 'handleSupplierCreated',
        'edit'=> 'handleEdit',
        'supplierUpdated' => 'handleSupplierUpdated',
    ];

    public function handleEdit($supplier)
    {
        $this->update = true;
        $this->supplier = $supplier;
        $this->dispatchBrowserEvent('showModal');

    }

    public function handleSupplierUpdated()
    {
        $this->emit('refresh');
        $this->alert('success', 'Berhasil', [
            'text' => 'Data supplier berhasil diubah',
        ]);
        $this->reset();
    }

    public function close()
    {
        $this->reset();
    }

    public function handleSupplierCreated()
    {
        /*emit untuk menutup modal ketika supplier disimpan*/
        $this->emit('refresh');

        /*memberikan pesan sukses ketika supplier berhasil disimpan*/
        $this->alert('success', 'Berhasil', [
            'text' =>   'Data Supplier berhasil ditambahkan',
        ]);
    }
    public function render()
    {
        return view('livewire.pages.suppliers.index');
    }
}
