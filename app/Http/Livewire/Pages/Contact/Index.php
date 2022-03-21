<?php

namespace App\Http\Livewire\Pages\Contact;

use Livewire\Component;

class Index extends Component
{
    public $type_contact = 'customer';

    public function updateType($type)
    {
        $this->type_contact = $type;
        $this->emitTo(Table::class, 'type', $type);

    }
    public function render()
    {
        return view('livewire.pages.contact.index');
    }
}
