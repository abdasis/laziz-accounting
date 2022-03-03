<?php

namespace App\Http\Livewire\Pages\Customers;

use App\Models\Customer;
use App\Traits\DeleteConfirm;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class Table extends DataTableComponent
{
    use DeleteConfirm;
    public bool $columnSelect = true;
    protected $listeners = ['confirmed'];

    public function confirmed()
    {
        if ($this->model_id) {
           Customer::find($this->model_id)->delete();
            $this->alert('success', 'Berhasil', [
                'text' => 'Customer berhasil dihapus',
            ]);
        }else{
            $this->alert('error', 'Gagal', [
                'text' => 'Customer gagal dihapus',
            ]);
        }
    }

    public function columns(): array
    {
        return [
            Column::make('Nama Perusahaan', 'company_name')
                ->format(function ($name, $column, $customer){
                    return '<a class="fw-bold" href="'.route('customers.show', $customer->id).'">'.$customer->company_name.'</a>';
                })
                ->asHtml()
                ->searchable()->sortable(),
            Column::make('Contact Person', 'contact_name')->searchable()->sortable(),
            Column::make('Email', 'email')->searchable()->sortable(),
            Column::make('Telepon', 'phone')->searchable()->sortable(),
            Column::make('Status', 'status')->format(function ($val){
                $status = $val == 'active' ? 'Aktif' : 'Tidak Aktif';
                $badge = $val == 'active' ? 'success' : 'danger';
                return "<span class='badge badge-outline-$badge'>{$status}</span>";
            })->asHtml()->searchable()->sortable(),
            Column::make('Aksi', 'id')->format(function ($id, $kolom, $baris){
                return view('partials.button_actions', [
                    'editModal' => $baris,
                    'delete' => $id
                ]);
            }),
        ];
    }

    public function query(): Builder
    {
        return  Customer::query();

    }
}
