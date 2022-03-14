<?php

namespace App\Http\Livewire\Pages\Purchase;

use App\Models\purchase;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Kode Pembelian', 'code')->sortable()->searchable(),
            Column::make('Tanggal Pembelian', 'transaction_date')->sortable()->searchable(),
        ];
    }

    public function query(): Builder
    {
        return purchase::query();

    }
}
