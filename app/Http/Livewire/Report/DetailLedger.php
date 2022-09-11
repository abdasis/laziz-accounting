<?php

namespace App\Http\Livewire\Report;

use App\Models\Account;
use Livewire\Component;

class DetailLedger extends Component
{
    public $soa;
    public function mount($kode)
    {
        $this->soa = Account::where('code', $kode)->first();
    }
    public function render()
    {
        return view('livewire.report.detail-ledger');
    }
}
