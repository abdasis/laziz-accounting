<?php

namespace App\Http\Livewire\Pages\Employee;

use App\Models\Employee;
use App\Traits\DeleteConfirm;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{
    use DeleteConfirm;

    protected $listeners = ['confirmed' => 'deleteEmployee'];

    public function deleteEmployee()
    {
        if ($this->model_id){
            $employee = Employee::find($this->model_id);
            $employee->delete();
            $this->alert('success', 'Berhasil', [
                'text' => 'Data karyawan berhasil dihapus',
            ]);
        }else{
            $this->alert('error', 'Gagal', [
                'text' => 'Data karyawan gagal dihapus',
            ]);
        }
    }

    public function columns(): array
    {
        return [
            Column::make('Nama Karyawan', 'name')->searchable(),
            Column::make('NIK', 'ktp')->searchable(),
            Column::make('Telepon', 'phone')->searchable(),
            Column::make('Jenis kelamin', 'gender')->searchable(),
            Column::make('Aksi', 'id')->format(function ($val, $kolom, $baris){
                return view('partials.button_actions', [
                    'editModal'=> $baris,
                    'delete' => $val,
                ]);
            })
        ];
    }

    public function query(): Builder
    {
        return Employee::query();

    }
}
