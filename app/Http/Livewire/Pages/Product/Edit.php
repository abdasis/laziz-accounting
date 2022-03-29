<?php

namespace App\Http\Livewire\Pages\Product;

use App\Models\Product;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{

    use LivewireAlert;
    public $code, $name, $description, $price, $tax, $sale_account;
    public $purchase_account;
    public $sales_price, $purchase_price;

    public $product;
    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required|min:3',
        'sale_account' => 'required',
        'purchase_account' => 'required',
    ];

    public function mount(Product $product)
    {
        $this->code = "PRD-" . Carbon::now()->format('Ym') . Product::max('id') + 1;
        $this->product = $product;
        $this->code = $product->code;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->tax = $product->tax;
        $this->sale_account = $product->sale_account;
        $this->purchase_account = $product->purchase_account;
        $this->sales_price = $product->sales_price;
        $this->purchase_price = $product->purchase_price;

    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function update()
    {
        $this->validate();
        try {
            Product::where('id', $this->product->id)->update([
                'name' => $this->name,
                'code' => $this->code,
                'description' => $this->description,
                'price' => $this->price,
                'tax' => $this->tax,
                'sale_account' => $this->sale_account,
                'purchase_account' => $this->purchase_account,
            ]);

            $this->flash('success', 'Berhasil' , [
                'text' => "Data {$this->name} berhasil diubah",
            ], route('products.show', $this->product->id));

        }catch (\Exception $e) {
            $this->alert('error', 'Kesalaham', [
                'text' => 'Terjadi kesalahan saat menyimpan data'
            ]);
        }

    }

    public function render()
    {
        return view('livewire.pages.product.edit',[
            'accounts' => \App\Models\Account::orderBy('name', 'asc')->where('lock_status', 'unlocked')->get(),
        ]);
    }
}
