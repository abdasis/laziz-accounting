<?php

namespace App\Http\Livewire\Pages\Cost;

use Carbon\Carbon;
use Cron\AbstractField;
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
            Column::make('Dibuat Oleh', 'creator.name'),
            Column::make("Tgl Dibuat", "created_at")
                ->format(function ($date){
                    return Carbon::parse($date)->format('d-m-Y');
                })
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Cost::query();
    }
}
