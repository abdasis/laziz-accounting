<?php

namespace App\Http\Livewire\Cost;

use App\Models\Cost;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

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
                })->html()
                ->sortable(),
            Column::make('Keterangan', 'description')->searchable(),
            Column::make('Dibuat Oleh', 'creator.name'),
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

    public function builder(): Builder
    {
        return Cost::query();
    }
}
