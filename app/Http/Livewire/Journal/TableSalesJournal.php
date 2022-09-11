<?php

namespace App\Http\Livewire\Journal;

use App\Models\Journal;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class TableSalesJournal extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Date', 'transaction_date')->format(function ($value) {
                return Carbon::parse($value)->format('d/m/Y');
            })->addAttributes(['rowspan' => 2]),
            Column::make('No. Document', 'code')->addAttributes(['rowspan' => 2]),
            Column::make('Description', 'description')->addAttributes(['rowspan' => 2]),
            Column::make('Ref', 'no_referensi')->addAttributes(['rowspan' => 2]),
            Column::make('Debet', 'blank')->addAttributes(['colspan' => 3]),
            Column::make('Piutang', 'blank'),
        ];
    }

    public function query(): Builder
    {
        return Journal::query();
    }
}
