<?php

namespace App\Http\Livewire\Pages\Employee;

use App\Models\Employee;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{

    use LivewireAlert;

    public $name, $ktp, $phone, $gender, $address, $maritial_status, $date_birthday, $place_of_birth;

    public $employee_id;
    protected $rules = [
        'name' => 'required',
        'ktp' => 'required|numeric'
    ];

    public function mount($employee)
    {
        $this->name = $employee['name'];
        $this->ktp = $employee['ktp'];
        $this->phone = $employee['phone'];
        $this->gender = $employee['gender'];
        $this->address = $employee['address'];
        $this->maritial_status = $employee['marital_status'];
        $this->date_birthday = $employee['date_birthday'];
        $this->place_of_birth = $employee['place_of_birth'];
        $this->employee_id = $employee['id'];
    }

    public function update()
    {
        $this->validate();

        try {
            Employee::where('id', $this->employee_id)->update([
                'name' => $this->name,
                'ktp' => $this->ktp,
                'phone' => $this->phone,
                'gender' => $this->gender,
                'marital_status' => $this->maritial_status,
                'date_birthday' => $this->date_birthday,
                'place_of_birth' => $this->place_of_birth,
                'address' => $this->address,
            ]);

            $this->emitTo(Index::class, 'employeeUpdated');

        }catch (\Exception $e) {

            $this->alert('error', 'Gagal', [
                'text' => 'Data Karyawan Gagal Ditambahkan',
            ]);
        }
    }
    public function render()
    {
        return view('livewire.pages.employee.edit');
    }
}
