<?php

namespace App\Http\Livewire\Pages\Purchase;

use App\Models\Account;
use App\Models\Contact;
use App\Models\purchase;
use App\Models\PurchaseDetails;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{

    use LivewireAlert;

    public $supplier_id, $code, $transaction_date, $due_date, $no_transaction, $no_refrence, $address;

    public $product, $description, $quantity, $unit, $tax, $price, $total_price;

    public $notes, $message;

    public $inputs = [], $i = 1;

    public $sub_total;
    public $ppn, $pph_total;
    public $total;
    public $total_tagihan;
    public $potongan;
    public $potongan_nominal;
    public $grand_total;


    public function rules()
    {
        return [
            'supplier_id' => 'required',
            'transaction_date' => 'required',
            'due_date' => 'required',
            'product' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'tax' => 'required',
            'price' => 'required',
            'total_price' => 'required',
        ];
    }

    public function addForm($i)
    {
        $i = $i + 1;
        $this->i = $i;
        return array_push($this->inputs, $i);
    }

    public function removeForm($i)
    {
        unset($this->inputs[$i]);
    }

    public function mount()
    {
        $transaction = Purchase::max('no_transaction');
        $this->no_transaction = $transaction+1;
        array_push($this->inputs, 1);

    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }


    public function updatedTransactionDate()
    {
        $this->due_date = Carbon::parse($this->transaction_date)->addDays(30)->format('Y-m-d');
    }

    public function updatedSupplierId()
    {
        $this->address = Contact::find($this->supplier_id)->shipping_address;
    }

    public function codeTrasanctionGenerator()
    {
        $transaction = Purchase::max('no_transaction');
        $code = 'PUR-' . Carbon::now()->format('ymd') . ($transaction+1);
        return $code;
    }

    public function totalPrice($key)
    {
        if (!empty($this->quantity[$key]) && !empty($this->price[$key]) && !empty($this->tax[$key])) {
            $this->total_price[$key] = $this->quantity[$key] * $this->price[$key];
            $this->ppn[$key] = $this->quantity[$key] * $this->price[$key] * $this->tax[$key] / 100;
            $this->total[$key] = $this->total_price[$key];
            $this->total_tagihan= collect($this->total)->sum();
        }elseif(!empty($this->quantity[$key]) && !empty($this->price[$key]) ){
            $this->total_price[$key] = $this->quantity[$key] * $this->price[$key];
        }
    }

    public function updatedQuantity($value, $key)
    {
        $this->totalPrice($key);
    }

    public function updatedPrice($value, $key)
    {
        $this->totalPrice($key);
    }

    public function updatedTax($value, $key)
    {
        $this->totalPrice($key);
    }

    public function updatedPotonganNominal($value)
    {
        if (collect($this->total)->sum() > 0 && !empty($this->potongan_nominal)) {
//            $this->pph_total = collect($this->total_price)->sum() + collect($this->ppn)->sum() * ($this->potongan_nominal / 100);
            $dpp = collect($this->total_price)->sum() + collect($this->ppn)->sum();
            $pph = $this->potongan_nominal / 100;
            $this->pph_total = $dpp * $pph;
        }else{
            $this->total_tagihan = collect($this->total)->sum();
        }
    }


    public function save()
    {
        $this->validate();
        try {
            \DB::beginTransaction();
            $purchase  = Purchase::create([
                'contact_id' => $this->supplier_id,
                'code' => $this->codeTrasanctionGenerator(),
                'transaction_date' => $this->transaction_date,
                'due_date' => $this->due_date,
                'no_transaction' => $this->no_transaction,
                'status' => 'belum dibayar',
                'income_tax' => $this->potongan_nominal,
                'income_tax_type' => $this->potongan,
                'created_by' => \Auth::user()->id,
                'updated_by' => \Auth::user()->id,
                'remarks' => $this->notes,
                'internal_notes' => $this->message,
            ]);

            $products = [];
            foreach ($this->product as $key => $product){
                $products[] = new PurchaseDetails([
                    'product' => $this->product[$key],
                    'description' => $this->description[$key],
                    'quantity' => $this->quantity[$key],
                    'tax' => $this->tax[$key],
                    'price' => $this->price[$key],
                    'total' => $this->total_price[$key],
                ]);
            }

            $purchase->details()->saveMany($products);

            $this->alert('success', 'Berhasil',[
                'text'=> 'Data berhasil disimpan',
            ]);

            \DB::commit();

            $this->reset();

            $this->no_transaction = Purchase::max('no_transaction')+1;

        }catch (\Throwable $e) {
            \DB::rollBack();
            $this->alert('error', 'Gagal',[
                'text'=> 'Data gagal disimpan',
            ]);
        }
    }
    public function render()
    {
        return view('livewire.pages.purchase.create',[
            'suppliers' => Contact::where('type_contact', 'supplier')->orderBy('company_name', 'asc')
                ->where('status', 'active')
                ->get(),
            'taxes' => Account::all(),
        ]);
    }
}
