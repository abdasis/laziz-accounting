<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{

    public function getTableRowUrl($row)
    {
        return route('products.show', $row);
    }
    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make('Kode', 'code')
                ->searchable()
                ->sortable(),
            Column::make("Name", "name")
                ->searchable()
                ->sortable(),
            Column::make('Price', 'price')
                ->searchable()
                ->sortable()
                ->format(function ($price){
                    return rupiah($price);
                }),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Product::query();
    }
}
