<?php

namespace App\Http\Livewire\Sales;

use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use phpDocumentor\Reflection\Utils;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{

    public function getTableRowUrl($id): string
    {
        return route('sales.show', $id);
    }


    public function columns(): array
    {
        return [
            Column::make('Kode Transaksi', 'no_transaction')
                ->searchable()
                ->format(function ($val, $row, $column) {
                    $bulan_romawi = getRoman(\Carbon\Carbon::parse($column->transaction_date)->format('m'));
                    $tahun = \Carbon\Carbon::parse($column->transaction_date)->format('Y');
                    $val = "{$val}/INV/SOKA-R/{$bulan_romawi}/{$tahun}";
                    return "<span class='fw-bold text-warning'>{$val}</span>";
                })
                ->asHtml()
                ->sortable(),
            Column::make('Customer', 'customer.company_name')->format(function ($customer) {
                return "<span>{$customer}</span>";
            })->asHtml(),
            Column::make('Tanggal Penjualan', 'transaction_date')->format(function ($val){
                return Carbon::parse($val)->format('d-m-Y');
            })->sortable(),
            Column::make('Jatuh Tempo', 'due_date')->format(function ($val){
                return Carbon::parse($val)->format('d-m-Y');
            })->sortable(),
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
            Column::make('Total', 'total')->format(function ($val){
                return rupiah($val);
            })->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Sales::query();
    }
}
