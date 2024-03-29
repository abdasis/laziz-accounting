<?php

namespace App\Http\Livewire\Account;

use App\Models\Account;
use App\Models\AccountCategory;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    public $account_category_id, $name, $code, $description, $parent_id, $report_type, $default_balance, $lock_status = 'unlocked';
    public $account_type = 'umum';

    public function rules()
    {
        return [
            'account_category_id' => 'required',
            'name' => 'required|unique:accounts,name',
            'code' => 'required|unique:accounts,code',
            'report_type'=> 'required',
            'default_balance'=> 'required',
        ];
    }

    public function makeCodeAccount()
    {
        $category = AccountCategory::where('id', $this->account_category_id)->first();

        $account = Account::where('account_category_id', $this->account_category_id)
            ->where('lock_status', 'locked')->max('code');

        if ($account == null){
            $code = $category->code+10000;
        }else{
            $code = $account+10000;
        }


        return $code;

    }

    public function updatedAccountCategoryId()
    {
        $this->code = $this->makeCodeAccount();
    }

    public function updatedParentId()
    {
        if ($this->parent_id != null){
            $account = Account::where('id', $this->parent_id)->first();
            if($account != null && $account->lock_status == 'locked' && $account->parent_id == null){
                $locked_code = Account::where('parent_id', $this->parent_id)->max('code');
                if ($locked_code == null){
                    $this->code = $account->code+1000;
                }else{
                    $this->code = $locked_code+1000;
                }
            }elseif($account != null && $account->lock_status == 'locked' && $account->parent_id != null){
                $locked_code = Account::where('parent_id', $this->parent_id)->max('code');
                if ($locked_code == null){
                    $this->code = $account->code+1;
                }else{
                    $this->code = $locked_code+1;
                }
            }else{
                $account = Account::where('id', $this->parent_id)->max('code');
                $this->code = $account+10000;
            }
        }else{
            $this->code = $this->makeCodeAccount();
            $this->parent_id = null;
        }

    }

    public function updateLock()
    {
        if($this->lock_status == 'locked'){
            $this->lock_status = 'unlocked';
        }else{
            $this->lock_status = 'locked';
        }
    }

    public function updateAccountType()
    {
        if ($this->account_type == 'kas'){
            $this->account_type = 'umum';
        }else{
            $this->account_type = 'kas';
        }
    }

    public function store()
    {
        $this->validate();
        try {
            Account::create([
                'account_category_id' => $this->account_category_id,
                'name' => $this->name,
                'code' => $this->code,
                'description' => $this->description,
                'parent_id' => $this->parent_id,
                'report_type' => $this->report_type,
                'default_balance' => $this->default_balance,
                'lock_status' => $this->lock_status,
                'account_type' => $this->account_type,
                'status' => 'active',
            ]);
            $this->reset();
            $this->emitTo(Index::class, 'accountCreated');
        }catch (\Throwable $exception) {
            $this->alert('error', 'Gagal', [
                'text'=> 'Data gagal ditambahkan',
            ]);
        }
    }
    public function render()
    {
        return view('livewire.account.create',[
            'account_categories' => AccountCategory::orderBy('code', 'asc')->get(),
            'accounts' => Account::where('lock_status', 'locked')->orderBy('name', 'asc')->get(),
        ]);
    }
}
