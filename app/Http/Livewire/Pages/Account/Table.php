<?php

namespace App\Http\Livewire\Pages\Account;

use App\Models\Account;
use App\Traits\DeleteConfirm;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{
    use DeleteConfirm;

    protected $listeners = ['confirmed' => 'deleteAccount'];

    public function deleteAccount()
    {
        if ($this->model_id) {
            $account = Account::find($this->model_id);
            if ($account->lock_status == 'locked'){
                $this->alert('warning', 'Maaf!', [
                    'text' => 'Akun ini sedang dikunci, tidak dapat dihapus.',
                ]);

                return false;
            }else{
                $account->delete();
                $this->alert('success', 'Berhasil!', [
                    'text' => 'Akun berhasil dihapus.',
                ]);
            }
        }
    }

    public function columns(): array
    {
        return [
            Column::make('🔒', 'lock_status')->format(function ($val){
                if ($val == 'locked') {
                    return '<span class="text-danger">
                                <i class="fas fa-lock"></i>
                            </span>';
                }else{
                    return '<span class="text-success fw-bold ps-2">
                                <i class="fas fa-unlock"></i>
                            </span>';
                }
            })->addAttributes(['width' => '1%'])
                ->searchable()
            ->asHtml(),
            Column::make('Kode', 'code')->format(function ($val, $column, $row){
                $code = number_format($val, 0, ',', '-');
                if ($row->lock_status == 'locked') {
                    return "<span class='fw-bold'>$code</span>";
                }else{
                    return "<span class='ps-2'>$code</span>";
                }
            })->asHtml()->sortable()->sortable(),
            Column::make('Nama', 'name')->format(function ($val, $cloumn, $row){
                $url = route('accounts.show', $row->id);
                if ($row->lock_status == 'locked') {
                    return "<a class='fw-bold' href='$url'>$val</a>";
                }else{
                    return "<a class='ps-2' href='$url'>$val</a>";
                }
            })->asHtml()->sortable()->searchable(),
            Column::make('Tgl. Dibuat', 'created_at')->sortable()->format(function ($val){
                return Carbon::parse($val)->format('d-m-Y H:i:s');
            }),
            Column::make('Tgl. Diupdate', 'updated_at')->sortable()->format(function ($val){
                return Carbon::parse($val)->format('d-m-Y H:i:s');
            }),
            Column::make('Aksi', 'id')->format(function ($val, $column, $row){
                return view('partials.button_actions', [
                    'editModal' => $row,
                    'delete' => $val,
                ]);
            }),
        ];
    }

    public function query(): Builder
    {
        return Account::query();

    }
}
