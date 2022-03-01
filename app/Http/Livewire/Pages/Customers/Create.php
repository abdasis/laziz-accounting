<?php

namespace App\Http\Livewire\Pages\Customers;

use App\Models\Customer;
use App\Repositories\CustomerRepositoryInterface;
use Illuminate\Database\QueryException;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    public $company_name, $contact_name, $email, $phone, $province, $city, $districts ,$address, $postal_code, $status;

    protected $customer;
    protected $rules = [
        'company_name' => 'required|string|max:255',
        'contact_name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:customers',
        'phone' => 'required|string|max:255',
        'province' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'districts' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'postal_code' => 'required|string|max:10',
    ];

    public function boot(CustomerRepositoryInterface $customerRepository)
    {
        $this->customer = $customerRepository;
    }
    public function store()
    {
        $this->validate();
        try {
            $this->customer->create([
                'company_name' => $this->company_name,
                'contact_name' => $this->contact_name,
                'email' => $this->email,
                'phone' => $this->phone,
                'province' => $this->province,
                'city' => $this->city,
                'districts' => $this->districts,
                'address' => $this->address,
                'postal_code' => $this->postal_code,
                'status' => 'active',
            ]);
            $this->alert('success', 'Berhasil 👌',[
                'text' => 'Data Customer berhasil ditambahkan',
            ]);
            $this->reset();
        }catch (QueryException $e){
            $this->alert('error', 'Kesalahan', [
                'text' => 'Terjadi kesalahan saat menyimpan data',
            ]);
        }

    }
    public function render()
    {
        return view('livewire.pages.customers.create');
    }
}
