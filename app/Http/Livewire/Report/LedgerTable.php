<?php

namespace App\Http\Livewire\Report;

use App\Models\Account;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class LedgerTable extends DataTableComponent
{

    public function getTableRowUrl($code): string
    {
        return route('reports.ledger-detail', $code->code);
    }

    public function columns(): array
    {
        return [
            Column::make('Kode Akun', 'code')
                ->sortable(),
            Column::make('Nama Akun', 'name')
                ->sortable()->searchable(),
        ];
    }

    public function query(): Builder
    {
        return Account::query();
    }
}
