<?php

namespace App\Http\Livewire\AccountCategory;

use App\Models\AccountCategory;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    public $category;
    public $name, $code, $notes;

    public function rules()
    {
        $category_id = $this->category['id'];
        return[
            'name' => 'required|min:3|max:50',
            'code' => "required|min:3|max:50|unique:account_categories,code,".$category_id,
        ];

    }


    public function mount($category)
    {
        $this->name = $category['name'];
        $this->code = $category['code'];
        $this->notes = $category['notes'];
        $this->category = $category;
    }


    public function update()
    {
        $this->validate();

        try {
            AccountCategory::where('id', $this->category['id'])->update([
                'name' => $this->name,
                'code' => $this->code,
                'notes' => $this->notes,
            ]);
            $this->emit('refresh');

        }catch (\Exception $e) {
            $this->alert('error', 'Gagal', [
                'text'=> 'Kategori akun gagal diperbarui',
            ]);
            return redirect()->back();
        }

        $this->emitTo('account-category.index', 'categoryUpdated');
    }
    public function render()
    {
        return view('livewire.account-category.edit');
    }
}
