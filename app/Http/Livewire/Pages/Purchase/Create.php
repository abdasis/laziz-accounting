<?php

namespace App\Http\Livewire\Pages\Purchase;

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

    public $inputs = [], $i = 1;

    public function rules()
    {
        return [
            'supplier_id' => 'required',
            'transaction_date' => 'required',
            'due_date' => 'required',
            'product' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'unit' => 'required',
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

    public function mount()
    {
        $transaction = Purchase::max('no_transaction');
        $this->no_transaction = $transaction+1;
    }

    public function updatedTransactionDate()
    {
        $this->due_date = Carbon::parse($this->transaction_date)->addDays(30)->format('Y-m-d');
    }

    public function updatedSupplierId()
    {
        $this->address = Supplier::find($this->supplier_id)->address;
    }

    public function codeTrasanctionGenerator()
    {
        $transaction = Purchase::max('no_transaction');
        $code = 'PUR-' . Carbon::now()->format('ymd') . ($transaction+1);
        return $code;
    }

    public function calcTotalPrice()
    {
        $total_price = $this->quantity * $this->price + ($this->quantity * $this->price * $this->tax / 100);

        return $total_price;
    }

    public function save()
    {
        try {
            \DB::beginTransaction();
            $purchase  = Purchase::create([
                'supplier_id' => $this->supplier_id,
                'code' => $this->codeTrasanctionGenerator(),
                'transaction_date' => $this->transaction_date,
                'due_date' => $this->due_date,
                'no_transaction' => $this->no_transaction,
                'status' => 'belum dibayar',
                'created_by' => \Auth::user()->id,
                'updated_by' => \Auth::user()->id,
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
            dd($e);
            $this->alert('error', 'Gagal',[
                'text'=> 'Data gagal disimpan',
            ]);
        }
    }
    public function render()
    {
        return view('livewire.pages.purchase.create',[
            'suppliers' => Supplier::orderBy('company_name', 'asc')
                ->where('status', 'active')
                ->get(),
        ]);
    }
}
