<?php

namespace App\Http\Livewire\Staff;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make('Nama Staff', 'name')->format(function($name){
                return "<span class='fw-bold text-primary'>{$name}</span>";
            })->searchable()->sortable()->asHtml(),
            Column::make('Email', 'email')->sortable()->searchable(),
            Column::make("Created at", "created_at")->format(function ($tanggal){
                return Carbon::parse($tanggal)->format('d-m-Y H:s:i');
            })
                ->sortable(),
            Column::make("Updated at", "updated_at")->format(function ($tanggal){
                return Carbon::parse($tanggal)->format('d-m-Y H:s:i');
            })
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return User::query();
    }
}
