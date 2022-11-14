<?php

namespace App\Traits;

use Jantinnerezo\LivewireAlert\LivewireAlert;

trait DeleteConfirm
{
    use LivewireAlert;

    public $model_id;
    /**
     * Delete the model.
     *
     * @return void
     */
    public function delete($id)
    {
        $this->confirm( 'Yakin hapus data ini?', [
            'text' => 'Data yang dihapus tidak dapat dikembalikan',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Ya, hapus',
            'onConfirmed' => 'confirmed',
            'allowOutsideClick' => false,
            'timer' => null,
            'iconHtml' => '<img class="img-fluid" src="/themes/icons/confirm.png"/>',
            'customClass' => [
                'icon' => 'border-warning'

            ],
        ]);
        $this->model_id = $id;
    }

}
