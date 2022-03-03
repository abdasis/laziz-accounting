<?php

namespace App\Http\Livewire\Pages\Customers;

use App\Models\Customer;
use App\Repositories\CustomerRepositoryInterface;
use Livewire\Component;

class Edit extends Component
{
    public $step = 1;
    public $company_name, $contact_name, $email, $phone, $province, $city, $districts, $address, $postal_code, $status;

    public $customer_id;

    protected $customer;
    public function boot(CustomerRepositoryInterface $customerRepository)
    {
        $this->customer = $customerRepository;
    }

    public function mount($customer)
    {
        $this->company_name = $customer['company_name'];
        $this->contact_name = $customer['contact_name'];
        $this->email = $customer['email'];
        $this->phone = $customer['phone'];
        $this->province = $customer['province'];
        $this->city = $customer['city'];
        $this->districts = $customer['districts'];
        $this->address = $customer['address'];
        $this->postal_code = $customer['postal_code'];
        $this->status = $customer['status'];
        $this->customer_id = $customer['id'];
    }

    public function companyInfo()
    {
        $this->validate([
            'company_name' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'districts' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
        ]);

        $this->step = 2;
    }

    public function back($value)
    {
        $this->step = $value;
    }

    public function contactInfo()
    {
        $this->validate([
            'contact_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:customers,email,'.$this->customer_id,
            'phone' => 'required|string|max:255',
        ]);
        $this->customer->update($this->customer_id, [
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
        $this->reset();
        $this->emitTo('pages.customers.index', 'customerUpdated');

    }

    public function render()
    {
        return view('livewire.pages.customers.edit');
    }
}
