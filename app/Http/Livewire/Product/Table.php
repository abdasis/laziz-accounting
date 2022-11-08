<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{


    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function ($row){
                return route('products.show', $row);
            });
    }


    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable(),
            Column::make('Kode', 'code')
                ->searchable()
                ->sortable(),
            Column::make("Nama Produk", "name")
                ->searchable()
                ->sortable(),
            Column::make('Harga', 'price')
                ->searchable()
                ->sortable()
                ->format(function ($price) {
                    return rupiah($price);
                }),
            Column::make("Dibuat Pada", "created_at")
                ->sortable(),
            Column::make("Terakhir Update", "updated_at")
                ->sortable(),
        ];
    }

    public function builder(): Builder
    {
        return Product::query();
    }
}
