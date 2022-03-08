<?php

namespace App\Http\Livewire\Pages\AccountCategory;

use App\Models\AccountCategory;
use App\Traits\DeleteConfirm;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{

    use DeleteConfirm;

    protected $listeners  = ['confirmed' => 'deleteCategory'];

    public function deleteCategory()
    {
        if ($this->model_id){
            AccountCategory::find($this->model_id)->delete();
            $this->alert('success', 'Berhasil', [
                'text' => 'Kategori berhasil dihapus',
            ]);
        }else{
            $this->alert('error', 'Kesalahan', [
                'text' => 'Kategori tidak ditemukan',
            ]);
        }
    }
    public function columns(): array
    {
        return [
            Column::make('Code', 'code')->sortable(),
            Column::make('Name', 'name'),
            Column::make('Description', 'notes'),
            Column::make('Dibuat Pada', 'created_at')->format(function ($val){
                return Carbon::parse($val)->format('d-m-Y H:i');
            }),
            Column::make('Diperbarui Pada', 'updated_at')->format(function ($val){
                return Carbon::parse($val)->format('d-m-Y H:i');
            }),
            Column::make('Aksi', 'id')->format(function ($val, $column, $row){
                return view('partials.button_actions', [
                    'editModal' => $row,
                    'delete' => $val
                ]);
            }),
        ];
    }

    public function query(): Builder
    {
        return AccountCategory::query()->orderBy('code', 'asc');
    }
}
