<?php

namespace App\Http\Livewire\Pages\Contact;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{

    public $type_contact = 'customer';
    public bool $columnSelect = true;

    protected $listeners = [
        'type' => 'setTypeContact',
    ];

    public function getTableRowUrl($id): string
    {
        return route('contacts.show', $id);
    }

    public function setTypeContact($type_contact)
    {
        $this->type_contact = $type_contact;
    }

    public function columns(): array
    {
        return [
            Column::make('Nama Perusahaan','company_name')->format(function ($val){
                return "<span class='fw-bold text-primary'>$val</span>";
            })->asHtml()->sortable()->searchable(),
            Column::make('Contact Person', 'contact_name')->searchable(),
            Column::make('Alamat', 'shipping_address')
                ->format(function ($val){
                    return \Str::limit($val, 20);
                })
                ->searchable(),
            Column::make('Email', 'email')->searchable(),
            Column::make('No. Telp', 'phone')->searchable(),
        ];
    }

    public function query(): Builder
    {
        return Contact::query()->where('type_contact',$this->type_contact);
    }
}
