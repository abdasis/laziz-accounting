<?php

namespace App\Http\Livewire\Pages\Cost;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Cost;

class Table extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make("Kode", "code")
                ->sortable(),
            Column::make('Keterangan', 'description')->searchable(),
            Column::make('Dibuat Oleh', 'pembuat.name'),
            Column::make('Total', 'total')->format(function ($total){
                return rupiah($total);
            }),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Cost::query();
    }
}
