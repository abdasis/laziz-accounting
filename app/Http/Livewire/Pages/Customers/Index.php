<?php

namespace App\Http\Livewire\Pages\Customers;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;
    public $modal = false;
    public $update = false;
    public $customer;


    protected $listeners = [
        'customerCreated' => 'handleCustomerCreated' ,
        'edit'=>'handleEdit',
        'customerUpdated' => 'handleCustomerUpdated' ,
    ];

    public function handleEdit($data)
    {
        $this->update = true;
        $this->customer = $data;
        $this->dispatchBrowserEvent('showModal');
    }

    public function close()
    {
        $this->reset();
    }

    public function handleCustomerCreated()
    {
        $this->emit('refresh');
        $this->alert('success', 'Berhasil', [
            'text' => 'Data customer berhasil ditambahkan',
        ]);
    }

    public function handleCustomerUpdated()
    {
        $this->emit('refresh');
        $this->alert('success', 'Berhasil', [
            'text' => 'Data customer berhasil diubah',
        ]);
        $this->reset();
    }
    public function render()
    {
        return view('livewire.pages.customers.index');
    }
}
