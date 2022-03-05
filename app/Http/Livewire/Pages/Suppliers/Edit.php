<?php

namespace App\Http\Livewire\Pages\Suppliers;

use App\Repositories\SupplierRepository;
use Livewire\Component;

class Edit extends Component
{

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

    public $step = 1;

    protected $supplier;
    public $supplier_id;
    protected $listeners = ['store' => 'companyInfo'];


    public function mount($supplier)
    {
        $this->supplier = $supplier;
        $this->company_name = $supplier['company_name'];
        $this->contact_name = $supplier['contact_name'];
        $this->email = $supplier['email'];
        $this->phone = $supplier['phone'];
        $this->province = $supplier['province'];
        $this->city = $supplier['city'];
        $this->districts = $supplier['districts'];
        $this->address = $supplier['address'];
        $this->postal_code = $supplier['postal_code'];
        $this->status = $supplier['status'];
        $this->industry_type = $supplier['industry_type'];
        $this->supplier_id = $supplier['id'];

    }

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
            'email' => 'required|email|max:255|unique:suppliers,email,'.$this->supplier_id,
            'phone' => 'required|string|max:255',
        ]);
        $this->supplier->update($this->supplier_id, [
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
        $this->emitTo('pages.suppliers.index', 'supplierUpdated');
    }

    public function render()
    {
        return view('livewire.pages.suppliers.edit');
    }
}
