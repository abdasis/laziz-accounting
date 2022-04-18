<?php

namespace App\Http\Livewire\Pages\Staff;

use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{

    use LivewireAlert;
    public $name, $email, $password, $password_confirmation;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required'
    ];

    public function store()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => \Hash::make($this->password)
        ]);

        $this->alert('success', 'Berhasil', [
            'text' => 'Pengguna Berhasil Disimpan'
        ]);
    }
    public function render()
    {
        return view('livewire.pages.staff.create');
    }
}
