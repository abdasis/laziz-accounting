<?php

namespace App\Http\Livewire\Contact;

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

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function ($row) {
                return route('contacts.show', $row->id);
            });
    }

    public function setTypeContact($type_contact)
    {
        $this->type_contact = $type_contact;
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->sortable(),
            Column::make('Nama Perusahaan', 'company_name')->format(function ($val) {
                return "<span class='fw-bold text-primary'>$val</span>";
            })->html()->sortable()->searchable(),
            Column::make('Contact Person', 'contact_name')->searchable(),
            Column::make('Alamat', 'shipping_address')
                ->format(function ($val) {
                    return \Str::limit($val, 20);
                })
                ->searchable(),
            Column::make('Email', 'email')->searchable(),
            Column::make('No. Telp', 'phone')->searchable(),
        ];
    }

    public function builder(): Builder
    {
        return Contact::query()->where('type_contact', $this->type_contact);
    }
}
