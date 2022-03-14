<?php

namespace App\Http\Livewire\Pages\Employee;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;

    public $update = false;

    public $employee;

    protected $listeners = [
        'edit' => 'handleEdit',
        'employeeCreated' => 'handleEmployeeCreated',
        'employeeUpdated' => 'handleEmployeeUpdated',
    ];

    public function handleEmployeeCreated()
    {
        $this->emit('refresh');
        $this->alert('success', 'Berhasil', [
            'text'=> 'Data karyawan berhasil ditambahkan',
        ]);
    }

    public function handleEmployeeUpdated()
    {
        $this->reset();
        $this->emit('refresh');
        $this->alert('success', 'Berhasil', [
            'text'=> 'Data karyawan berhasil diubah',
        ]);
    }

    public function close()
    {
        $this->reset();
    }

    public function handleEdit($employee)
    {

        $this->update = true;
        $this->employee = $employee;
        $this->dispatchBrowserEvent('showModal');
    }

    public function render()
    {
        return view('livewire.pages.employee.index');
    }
}
