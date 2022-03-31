<?php

namespace App\Http\Livewire\Pages\Contact;

use App\Models\Account;
use App\Models\Contact;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;

    public $nick_name, $type_contact, $contact_name, $handphone, $type_identity,
        $identity_number, $company_name, $phone, $email, $fax, $npwp, $purchase_address, $shipping_address,
        $bank_name,$bank_account_number, $branch_office, $bank_account_name, $akun_hutang_id, $akun_piutang_id,
        $status;

    public $contact_id;


    protected $rules = [
        'company_name' => 'required',
    ];

    public function mount(Contact $contact)
    {
        $this->nick_name = $contact->nick_name;
        $this->type_contact = $contact->type_contact;
        $this->contact_name = $contact->contact_name;
        $this->handphone = $contact->handphone;
        $this->type_identity = $contact->type_identity;
        $this->identity_number = $contact->identity_number;
        $this->company_name = $contact->company_name;
        $this->phone = $contact->phone;
        $this->email = $contact->email;
        $this->fax = $contact->fax;
        $this->npwp = $contact->npwp;
        $this->purchase_address = $contact->purchase_address;
        $this->shipping_address = $contact->shipping_address;
        $this->bank_name = $contact->bank_name;
        $this->bank_account_number = $contact->bank_account_number;
        $this->branch_office = $contact->branch_office;
        $this->bank_account_name = $contact->bank_account_name;
        $this->akun_hutang_id = $contact->akun_hutang;
        $this->akun_piutang_id = $contact->akun_piutang;
        $this->status = $contact->status;
        $this->contact_id = $contact->id;

    }


    public function simpan()
    {
        $this->validate();
        $contact = Contact::where('id', $this->contact_id)->update([
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
            'text' => "Data {$this->company_name} berhasil diperbarui",
        ]);
    }

    public function render()
    {
        return view('livewire.pages.contact.edit', [
            'accounts'=> Account::orderBy('name', 'asc')->get(),
        ]);
    }
}
