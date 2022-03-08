<?php

namespace App\Http\Livewire\Pages\Account;

use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Kode', 'code')->sortable(),
            Column::make('Nama', 'name')->sortable(),
            Column::make('Tgl. Dibuat', 'created_at')->sortable()->format(function ($val){
                return Carbon::parse($val)->format('d-m-Y H:i:s');
            }),
            Column::make('Tgl. Diupdate', 'updated_at')->sortable()->format(function ($val){
                return Carbon::parse($val)->format('d-m-Y H:i:s');
            }),
            Column::make('Aksi', 'id')->format(function ($val, $column, $row){
                return view('partials.button_actions', [
                    'editModal' => $row
                ]);
            }),
        ];
    }

    public function query(): Builder
    {
        return Account::query()->orderBy('code', 'asc');

    }
}
