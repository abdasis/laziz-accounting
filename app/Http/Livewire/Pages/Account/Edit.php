<?php

namespace App\Http\Livewire\Pages\Account;

use App\Models\Account;
use App\Models\AccountCategory;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{

    use LivewireAlert;
    public $account_category_id, $name, $code, $description, $parent_id, $account_type, $default_balance, $lock_status = 'unlocked';

    public $account_id;

    public function rules()
    {
        $id = $this->account_id;
        return [
            'account_category_id' => 'required',
            'name' => 'required|unique:accounts,name,'.$id,
            'code' => 'required|unique:accounts,code,'.$id,
            'account_type'=> 'required',
            'default_balance'=> 'required',
        ];
    }

    public function mount($account)
    {
        $this->account_category_id = $account['account_category_id'];
        $this->name = $account['name'];
        $this->code = $account['code'];
        $this->description = $account['description'];
        $this->parent_id = $account['parent_id'];
        $this->account_type = $account['report_type'];
        $this->default_balance = $account['default_balance'];
        $this->lock_status = $account['lock_status'];
        $this->account_id = $account['id'];

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

    public function store()
    {
        $this->validate();
        try {
            Account::where('id', $this->account_id)->update([
                'account_category_id' => $this->account_category_id,
                'name' => $this->name,
                'code' => $this->code,
                'description' => $this->description,
                'parent_id' => $this->parent_id,
                'report_type' => $this->account_type,
                'default_balance' => $this->default_balance,
                'lock_status' => $this->lock_status,
                'status' => 'active',
            ]);

            $this->emitTo(Index::class, 'accountUpdated');

        }catch (\Throwable $exception) {
            $this->alert('error', 'Gagal', [
                'text'=> 'Data gagal ditambahkan',
            ]);
        }
    }


    public function render()
    {
        return view('livewire.pages.account.edit',[
            'account_categories' => AccountCategory::orderBy('name', 'asc')->get(),
            'accounts' => Account::orderBy('name', 'asc')->get(),
        ]);
    }
}
