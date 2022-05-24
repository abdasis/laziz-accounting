<?php

namespace App\Http\Livewire\Pages\Cost;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Cost;

class Table extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Tgl. Transaksi', 'transaction_date')
                ->format(function ($date){
                    return Carbon::parse($date)->format('d-m-Y');
                })
                ->sortable(),
            Column::make("Nama Pengeluaran", "name")
                ->format(function ($code, $column, $row){
                    $url = route('cost.show', $row);
                    return "<a class='fw-bolder' href='$url'>$code</a>";
                })->asHtml()
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
