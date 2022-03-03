<?php

namespace App\Http\Livewire\Pages\Customers;

use App\Models\Customer;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Show extends Component
{

    use LivewireAlert;
    public $customer;
    public function mount($customer)
    {
        $this->customer = Customer::find($customer);
    }

    public function updateStatus()
    {
        if ($this->customer->status == 'active'){
            $this->customer->update(['status' => 'inactive']);
            $this->alert('success', 'Berhasil', [
                'text' => 'Status dinonaktifkan',
            ]);
        } else {
            $this->customer->update(['status' => 'active']);
            $this->alert('success', 'Berhasil', [
                'text' => 'Status diaktifkan',
            ]);
        }


    }

    public function render()
    {
        return view('livewire.pages.customers.show');
    }
}
