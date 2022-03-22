<?php

namespace App\Http\Livewire\Pages\Product;

use App\Models\Product;
use App\Traits\DeleteConfirm;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Show extends Component
{
    use LivewireAlert;
    use DeleteConfirm;
    public $product;

    protected $listeners = ['confirmed' => 'deleteProduct'];

    public function deleteProduct()
    {
        if ($this->model_id){
            Product::find($this->model_id)->delete();
            $this->flash('success', 'Berhasil', [
                'text' =>  'Data berhasil dihapus',
            ], route('products.index'));
        }else{
            $this->alert('error', 'Gagal', [
                'text' =>  'Data gagal dihapus',
            ]);
        }
    }

    public function mount(Product $product)
    {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.pages.product.show');
    }
}
