<?php

namespace App\Http\Livewire\Pages\Employee;

use App\Models\Employee;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    public $name, $ktp, $phone, $gender, $address, $marital_status, $date_birthday, $place_of_birth;

    protected $rules = [
        'name' => 'required',
        'ktp' => 'required'
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
                'marital_status' => $this->marital_status,
                'date_of_birth' => $this->date_birthday,
                'place_of_birth' => $this->place_of_birth,
                'address' => $this->address,
            ]);

            $this->alert('success', 'Berhasil', [
                'text' => 'Data Karyawan Berhasil Ditambahkan',
            ]);


        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function render()
    {
        return view('livewire.pages.employee.create');
    }
}
