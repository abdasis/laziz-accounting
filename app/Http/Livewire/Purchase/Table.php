<?php

namespace App\Http\Livewire\Purchase;

use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{

    public function getTableRowUrl($id): string
    {
        return route('purchases.show', $id);
    }

    public function columns(): array
    {
        return [
            Column::make('Tanggal Pembelian', 'transaction_date')
                ->format(function ($value){
                    return Carbon::parse($value)->format('d/m/Y');
                })
                ->sortable()->searchable(),
            Column::make('Kode Pembelian', 'code')->format(function ($val){
                return '<span class="fw-bold text-primary">'.$val.'</span>';
            })->sortable()->searchable()->asHtml(),
            Column::make('Supplier', 'supplier.company_name')->sortable()->searchable(),
            Column::make('Jatuh Tempo', 'due_date')->sortable()->searchable(),
            Column::make('Status', 'status')->format(function ($val){

                if ($val == 'belum dibayar'){
                    $badge = 'badge badge-soft-danger py-1 px-2';
                }elseif($val == 'dibayar'){
                    $badge = 'badge badge-soft-success py-1 px-2';
                }else{
                    $badge = 'badge badge-soft-warning py-1 px-2';
                }

                $val = \Str::title($val);

                return "<span class='$badge'>$val</span>";
            })->sortable()->asHtml(),
            Column::make('Total', 'total_price')->sortable()->format(function ($val){
                $harga = rupiah($val);
                return "<p class=' m-0 p-0 fw-bold text-end'>$harga</p>";
            })->asHtml()->addClass('float-end'),
        ];
    }

    public function query(): Builder
    {
        return Purchase::query();

    }
}
