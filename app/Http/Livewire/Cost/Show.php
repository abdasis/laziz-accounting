<?php

namespace App\Http\Livewire\Cost;

use App\Models\Cost;
use App\Traits\DeleteConfirm;
use Livewire\Component;

class Show extends Component
{
    use DeleteConfirm;

    protected $listeners = ['confirmed' => 'deleteCost'];
    public $cost;

    public function deleteCost()
    {
        if ($this->model_id) {
            try {
                \DB::beginTransaction();
                $cost = Cost::find($this->model_id);
                $cost->journal()->delete();
                $cost->delete();
                $this->flash('success', 'Berhasil', [
                    'text' => 'Data Biaya Berhasil Di Hapus'
                ], route('cost.index'));
                \DB::commit();
            }catch (\Exception $exception){
                \DB::rollBack();
                $this->flash('error', 'Gagal', [
                    'text' => 'Data Biaya Gagal Di Hapus'
                ], route('cost.index'));
            }
        }
    }
    public function mount(Cost $cost)
    {
        $this->cost = $cost;
    }
    public function render()
    {
        return view('livewire.cost.show');
    }
}
