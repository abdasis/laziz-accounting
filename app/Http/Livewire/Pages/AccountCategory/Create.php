<?php

namespace App\Http\Livewire\Pages\AccountCategory;

use App\Models\AccountCategory;
use App\Traits\DeleteConfirm;
use Illuminate\Database\QueryException;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    public $name, $code, $notes;

    protected $rules = [
        'name' => 'required|min:3|max:50',
        'code' => 'required|min:3|max:50|unique:account_categories',
    ];


    public function store()
    {
        $this->validate();
        try {
            AccountCategory::create([
                'name' => $this->name,
                'code' => $this->code,
                'notes' => $this->notes,
            ]);
            $this->emit('refresh');
            $this->emitUp('categoryCreated');
        }catch (QueryException $exception){
            $this->alert('error', 'Gagal', [
                'text' => 'Terjadi kesalahan saat menyimpan data',
            ]);
        }

    }
    public function render()
    {
        return view('livewire.pages.account-category.create');
    }
}
