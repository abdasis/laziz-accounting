<?php

namespace App\Http\Livewire\Pages\Purchase;

use App\Models\Account;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseDetails;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{

    use LivewireAlert;

    public $supplier_id, $code, $transaction_date, $due_date, $no_transaction, $no_refrence, $address;

    public $product, $description, $quantity, $unit, $tax, $price, $total_price;

    public $notes, $message;

    public $inputs = [], $i = 1;

    public $sub_total;
    public $ppn;
    public $total;
    public $total_tagihan;
    public $potongan;
    public $potongan_nominal;
    public $grand_total;
    public $purchase_id;
    public $pph;
    public $detail_id;

    public $purchase;


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



    public function mount(Purchase $purchase)
    {
        $this->purchase = $purchase;
        $this->supplier_id = $purchase->contact_id;
        $this->code = $purchase->code;
        $this->transaction_date = Carbon::parse($purchase->transaction_date)->format('Y-m-d');
        $this->due_date = Carbon::parse($purchase->due_date)->format('Y-m-d');
        $this->no_transaction = $purchase->no_transaction;
        $this->no_refrence = $purchase->no_refrence;
        $this->potongan = $purchase->income_tax_type;
        $this->potongan_nominal = $purchase->income_tax;
        $this->notes = $purchase->remarks;
        $this->message = $purchase->internal_notes;
        $this->address = $purchase->supplier->shipping_address;
        $this->total = $purchase->details->sum('total');
        $this->ppn = $this->total * $purchase->details->sum('tax') / 100;
        $this->sub_total = $this->total + $this->ppn;
        $this->pph = $this->sub_total * $purchase->income_tax / 100;
        $this->total_tagihan =$this->sub_total - $this->pph;
        $this->purchase_id = $purchase->id;
        foreach ($purchase->details as $key => $detail) {
            array_push($this->inputs, $key + 1);
            $this->product[$key] = $detail->product_id;
            $this->description[$key] = $detail->description;
            $this->quantity[$key] = $detail->quantity;
            $this->unit[$key] = $detail->unit;
            $this->tax[$key] = $detail->tax;
            $this->price[$key] = $detail->price;
            $this->total_price[$key] = $this->price[$key] * $this->quantity[$key];
            $this->detail_id[$key] = $detail->id;

        }

    }

    public function removeForm($i)
    {

        unset($this->inputs[$i]);

        $this->quantity[$i] = null;
        $this->unit[$i] = null;
        $this->tax[$i] = null;
        $this->price[$i] = null;
        $this->total_price[$i] = null;



        $price = collect($this->total_price)->sum();
        $tax = collect($this->tax)->sum();
        $ppn = $price * $tax / 100;
        $pph = $price * (float) $this->potongan / 100;


        $this->total = $price;
        $this->ppn = $ppn;
        $this->sub_total = $price + $ppn;
        $this->total_tagihan = $this->sub_total - $pph;



    }
    public function updated($property, $value)
    {
        $this->validateOnly($property);
    }

    public function updatedProduct($value, $key)
    {
        $product = Product::find($value);
        $this->description[$key] = $product->description;
        $this->price[$key] = $product->price;
        $this->tax[$key] = $product->tax;
        $this->quantity[$key] = 0;
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


    public function updatedQuantity($value, $key)
    {

        $this->total_price[$key] = (int) $this->price[$key] * $value;
        $this->total = collect($this->total_price)->sum();
        $this->ppn = $this->total * collect($this->tax)->sum() / 100;
        $this->sub_total = $this->total + $this->ppn;
        $this->pph = $this->sub_total * $this->potongan_nominal / 100;
        $this->total_tagihan = $this->sub_total - $this->pph;


    }

    public function updatedPrice($value, $key)
    {
        $this->total_price[$key] = (int) $value * $this->quantity[$key] ?? 0;
        $this->total_tagihan = $this->sub_total - $this->pph;

        $this->total = collect($this->total_price)->sum();
        $this->ppn = $this->total * collect($this->tax)->sum() / 100;
        $this->sub_total = $this->total + $this->ppn;
        $this->pph = $this->sub_total * $this->potongan_nominal / 100;

    }

    public function updatedTax($value, $key)
    {
        $this->total = collect($this->total_price)->sum();
        $this->ppn = $this->total * collect($this->tax)->sum() / 100;
        $this->sub_total = $this->total + $this->ppn;
        $this->pph = $this->sub_total * $this->potongan_nominal / 100;
        $this->total_tagihan = $this->sub_total - $this->pph;
    }

    public function updatedPotonganNominal($value, $key)
    {
        $this->pph = $this->sub_total * (int) $value / 100;
        $this->total_tagihan = $this->sub_total - $this->pph;
    }

    public function save()
    {
        $this->validate();
        try {
            \DB::beginTransaction();
            $purchase  = Purchase::where('id', $this->purchase_id)->update([
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
                if ($this->total_price[$key] != null){
                    $products[] = new PurchaseDetails([
                        'product_id' => $this->product[$key],
                        'description' => $this->description[$key],
                        'quantity' => $this->quantity[$key],
                        'tax' => $this->tax[$key],
                        'price' => $this->price[$key],
                        'total' => $this->total_price[$key],
                    ]);
                }
            }


            $purchase = Purchase::find($this->purchase_id);

            $purchase->details()->delete();

            $purchase->details()->saveMany($products);

            $this->flash('success', 'Berhasil',[
                'text'=> "Data {$purchase->code} berhasil diubah",
            ], route('purchases.show', $purchase->id));

            \DB::commit();

        }catch (\Throwable $e) {
            \DB::rollBack();
            $this->alert('error', 'Gagal',[
                'text'=> 'Data gagal disimpan',
            ]);
        }
    }
    public function render()
    {
        return view('livewire.pages.purchase.edit',[
            'suppliers' => Contact::where('type_contact', 'supplier')->orderBy('company_name', 'asc')
                ->where('status', 'active')
                ->get(),
            'taxes' => Account::all(),
            'products' => Product::all(),
        ]);
    }
}
