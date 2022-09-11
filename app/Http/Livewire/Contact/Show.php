<?php

namespace App\Http\Livewire\Contact;

use App\Models\Contact;
use App\Traits\DeleteConfirm;
use Livewire\Component;

class Show extends Component
{
    use DeleteConfirm;

    public $contact;

    protected $listeners = ['confirmed' => 'deleteContact'];

    public function deleteContact()
    {
        if ($this->model_id){
            Contact::find($this->model_id)->delete();
            $this->flash('success', 'Berhasil', [
                'text' => 'Contact Berhasil Dihapus',
            ], route('contacts.index'));
        }else{
            $this->alert('error', 'Gagal', [
                'text' => 'Contact Gagal Dihapus',
            ]);
        }
    }

    public function mount($contact)
    {
        $this->contact = Contact::find($contact);
    }
    public function render()
    {
        return view('livewire.contact.show');
    }
}
