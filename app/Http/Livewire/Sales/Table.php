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

    public function configure(): void
    {
        $this->setPrimaryKey('id')
        ->setTableRowUrl(function ($row) {
            return route('sales.show', $row->id);
        });
    }


    public function columns(): array
    {
        return [
            Column::make('Kode Transaksi', 'id')
                ->searchable()
                ->format(function ($val, $column, $row) {
                    $bulan_romawi = getRoman(\Carbon\Carbon::parse($column->transaction_date)->format('m'));
                    $tahun = \Carbon\Carbon::parse($column->transaction_date)->format('Y');
                    $val = "{$val}/INV/SOKA-R/{$bulan_romawi}/{$tahun}";
                    return "<span class='fw-bold text-warning'>{$val}</span>";
                })
                ->html()
                ->sortable(),
            Column::make('Customer', 'customer.company_name')->format(function ($customer) {
                return "<span>{$customer}</span>";
            })->html(),
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
            })->sortable()->html(),
            Column::make('Total', 'id')->format(function ($val, $column, $row){
                return rupiah($column->details_sum_total);
            })->sortable(),
        ];
    }

    public function builder(): Builder
    {
        return Sales::query()->withSum('details', 'total');
    }
}
