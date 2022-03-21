<?php

namespace App\Http\Livewire\Pages\Product;

use App\Models\Product;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{

    use LivewireAlert;
    public $code, $name, $description, $price, $tax, $sale_account;
    public $purchase_account;

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required|min:3',
        'sale_account' => 'required',
        'purchase_account' => 'required',
    ];

    public function mount()
    {
        $this->code = "PRD-" . Carbon::now()->format('Ym') . Product::max('id') + 1;
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function store()
    {
        $this->validate();
        try {
            Product::create([
                'name' => $this->name,
                'code' => $this->code,
                'description' => $this->description,
                'price' => $this->price,
                'tax' => $this->tax,
                'sale_account' => $this->sale_account,
                'purchase_account' => $this->purchase_account,
            ]);

            $this->alert('success', 'Berhasil' , [
                'text' => 'Data berhasil disimpan',
            ]);

            $this->reset();
        }catch (\Exception $e) {
            dd($e);
            $this->alert('error', 'Kesalaham', [
                'text' => 'Terjadi kesalahan saat menyimpan data'
            ]);
        }

    }
    public function render()
    {
        return view('livewire.pages.product.create', [
            'accounts' => \App\Models\Account::orderBy('name', 'asc')->where('lock_status', 'unlocked')->get(),
        ]);
    }
}
