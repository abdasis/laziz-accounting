<?php

namespace App\Http\Livewire\Pages\Employee;

use App\Models\Employee;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    public $name, $ktp, $phone, $gender, $address, $maritial_status, $date_birthday, $place_of_birth;

    protected $rules = [
        'name' => 'required',
        'ktp' => 'required|numeric'
    ];


    public function save()
    {
        $this->validate();

        try {
            Employee::create([
                'name' => $this->name,
                'ktp' => $this->ktp,
                'phone' => $this->phone,
                'gender' => $this->gender,
                'marital_status' => $this->maritial_status,
                'date_birthday' => $this->date_birthday,
                'place_of_birth' => $this->place_of_birth,
                'address' => $this->address,
            ]);

            $this->reset();
            $this->emitTo(Index::class, 'employeeCreated');

        }catch (\Exception $e) {

            $this->alert('error', 'Gagal', [
                'text' => 'Data Karyawan Gagal Ditambahkan',
            ]);
        }
    }
    public function render()
    {
        return view('livewire.pages.employee.create');
    }
}
