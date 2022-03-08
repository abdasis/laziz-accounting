<?php

namespace App\Http\Livewire\Pages\Account;

use App\Models\Account;
use App\Models\AccountCategory;
use Illuminate\Database\QueryException;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    public $account_category_id, $name, $code, $description, $parent_id, $account_type, $default_balance;

    public $rules = [
        'account_category_id' => 'required',
        'name' => 'required|unique:accounts,name',
        'code' => 'required|unique:accounts,code',
        'account_type'=> 'required',
        'default_balance'=> 'required',
    ];

    public function makeCodeAccount()
    {
        /*mengambil data account category*/
        $account_category = AccountCategory::find($this->account_category_id);
        $code = $account_category->code;


        /*membuat kode akun dari kode tarakhir akun + 1*/
        $account = Account::where('account_category_id', $this->account_category_id)->latest()->first();
        if(is_null($account)) {
            $code_account = $code + 10000;
        }else{
            $code_account = $account->code + 1000;
        }

        return $code_account;

    }


    public function updatedAccountCategoryId()
    {
        $kode = $this->makeCodeAccount();
        $this->code = $kode;
    }

    public function updatedParentId()
    {
        try {
            $account = Account::where('account_category_id', $this->account_category_id)->where('parent_id', $this->parent_id)->latest()->first();
            if (!is_null($account)) {
                $this->code = $account->code + 1;
            }else{
                $account = Account::where('account_category_id', $this->account_category_id)->where('id', $this->parent_id)->latest()->first();
                if ($account){
                    $code = $account->code + 1;
                    $this->code = $code;
                }else{
                    $this->alert('warning', 'Kesalahan', [
                        'text' => 'Akun yang ada pilih tidak sesuai dengan kategori akun',
                    ]);
                    $this->parent_id = null;
                    return false;
                }
            }
        }catch (QueryException $exception){
            $this->alert('warning', 'Kesalahan', [
                'text' => 'Akun yang ada pilih tidak sesuai dengan kategori akun',
            ]);
            $this->parent_id = null;
            return false;
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
                'account_type' => $this->account_type,
                'default_balance' => $this->default_balance,
            ]);
            $this->alert('success', 'Berhasil', [
                'text'=> 'Data berhasil ditambahkan',
            ]);
        }catch (\Throwable $exception) {
            $this->alert('error', 'Gagal', [
                'text'=> 'Data gagal ditambahkan',
            ]);
            dd($exception);
        }
    }
    public function render()
    {
        return view('livewire.pages.account.create',[
            'account_categories' => AccountCategory::orderBy('name', 'asc')->get(),
            'accounts' => Account::orderBy('name', 'asc')->get(),
        ]);
    }
}
