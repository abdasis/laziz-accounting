<?php

namespace App\Http\Livewire\Account;

use App\Models\Account;
use App\Models\Contact;
use App\Models\JournalDetail;
use Carbon\Carbon;
use Livewire\Component;

class Show extends Component
{

    public $account;
    public $journals = [];

    public $priode_date;
    public $contact;

    public $account_id;

    public function mount(Account $account)
    {
        $this->account = $account;
        $journal = JournalDetail::whereHas('journal', function ($query) use ($account) {
            $query->where('account_id', $account->id);
        })->with('journal')->get();

        $this->journals = $journal->map(function ($item) {
            return[
                'transaction_date' => $item->journal->transaction_date,
                'contact' => $item->contact->company_name ?? '',
                'debet' => $item->debit,
                'credit' => $item->credit,
                'description' => $item->memo,
            ];
        });

        $this->account_id = $account->id;
    }

    public function filter()
    {

        $start = Carbon::parse(substr($this->priode_date,'1','10'))->format('Y-m-d');
        $end = Carbon::parse(substr($this->priode_date, '14', '20'))->format('Y-m-d');

        $journal = $this->journals = JournalDetail::whereHas('journal', function ($query) use ($start, $end) {
            $query->where('account_id', $this->account_id)->when($this->priode_date, function ($query) use ($start, $end) {
                return $query->whereBetween('transaction_date', [$start, $end]);
            })->when($this->contact, function ($query) {
                return $query->where('contact_id', $this->contact);
            })->orderBy('transaction_date', 'asc');
        })->with('journal')->get();

        $this->journals = $journal->map(function ($item) {
            return[
                'transaction_date' => $item->journal->transaction_date,
                'contact' => $item->contact->company_name ?? '',
                'debet' => $item->debit,
                'credit' => $item->credit,
                'description' => $item->memo,
            ];
        });
    }

    public function render()
    {
        return view('livewire.account.show', [
            'contacts' => Contact::orderBy('company_name', 'asc')->get(),
        ]);
    }
}
