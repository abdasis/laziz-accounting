<?php

namespace App\Http\Livewire\Pages\Suppliers;

use App\Repositories\SupplierRepository;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    public  $company_name,
            $contact_name,
            $email,
            $phone,
            $province,
            $city,
            $districts,
            $address,
            $postal_code,
            $status,
            $industry_type;

    protected $supplier;

    public $step = 1;

    protected $listeners = ['store' => 'companyInfo'];

    public function boot(SupplierRepository $supplier)
    {
        $this->supplier = $supplier;
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
            'industry_type' => 'required|string|max:255',
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
            'email' => 'required|email|max:255|unique:customers',
            'phone' => 'required|string|max:255',
        ]);
        $this->supplier->create([
            'company_name' => $this->company_name,
            'contact_name' => $this->contact_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'province' => $this->province,
            'city' => $this->city,
            'districts' => $this->districts,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'industry_type' => $this->industry_type,
            'status' => 'active',
        ]);
        $this->reset();
        $this->emitTo('pages.suppliers.index', 'supplierCreated');
    }

    public function render()
    {
        return view('livewire.pages.suppliers.create');
    }
}
