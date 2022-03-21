<?php

namespace App\Http\Livewire\Pages\Contact;

use App\Models\Account;
use App\Models\Contact;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    public $nick_name, $type_contact, $contact_name, $handphone, $type_identity,
    $identity_number, $company_name, $phone, $email, $fax, $npwp, $purchase_address, $shipping_address,
    $bank_name,$bank_account_number, $branch_office, $bank_account_name, $akun_hutang_id, $akun_piutang_id,
    $status;


    protected $rules = [
        'company_name' => 'required',
    ];


    public function simpan()
    {
        $this->validate();
        $contact = Contact::create([
            'nick_name' => $this->nick_name,
            'type_contact' => $this->type_contact,
            'contact_name' => $this->nick_name,
            'handphone' => $this->handphone,
            'type_identity' => $this->type_identity,
            'identity_number' => $this->identity_number,
            'company_name' => $this->company_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'fax' => $this->fax,
            'npwp' => $this->npwp,
            'purchase_address' => $this->purchase_address,
            'shipping_address' => $this->shipping_address,
            'bank_name' => $this->bank_name,
            'bank_account_number' => $this->bank_account_number,
            'branch_office' => $this->branch_office,
            'bank_account_name' => $this->bank_account_name,
            'akun_hutang' => $this->akun_hutang_id,
            'akun_piutang' => $this->akun_piutang_id,
            'status' => 'active',
        ]);

        $this->alert('success', 'Berhasil', [
            'text' => "Data {$this->company_name} berhasil ditambahkan",
        ]);
    }
    public function render()
    {
        return view('livewire.pages.contact.create',[
            'accounts' => Account::orderBy('name', 'asc')->get(),
        ]);
    }
}
