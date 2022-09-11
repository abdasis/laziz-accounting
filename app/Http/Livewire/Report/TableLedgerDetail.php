<?php

namespace App\Http\Livewire\Report;

use App\Models\JournalDetail;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class TableLedgerDetail extends DataTableComponent
{

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Date', 'journal.transaction_date'),
            Column::make('Contact', 'journal.contact.company_name'),
            Column::make('Description', 'memo'),
        ];
    }

    public function builder(): Builder
    {
        return JournalDetail::query();
    }
}
