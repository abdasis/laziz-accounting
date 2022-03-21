<?php

namespace App\Http\Livewire\Pages\Sales;

use App\Models\Account;
use App\Models\Contact;
use App\Models\Purchase;
use App\Models\Sales;
use App\Models\SalesDetails;
use App\Traits\GeneratePrice;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    use GeneratePrice;

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
            'product.0' => 'required',
            'description.0' => 'required',
            'quantity.0' => 'required',
            'tax.0' => 'required',
            'price.0' => 'required',
            'total_price.0' => 'required',

            'product.*' => 'required',
            'description.*' => 'required',
            'quantity.*' => 'required',
            'tax.*' => 'required',
            'price.*' => 'required',
            'total_price.*' => 'required',

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
        $transaction = Sales::max('no_transaction');
        $this->no_transaction = $transaction+1;
        array_push($this->inputs, 1);

    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function updatedQuantity($value, $key)
    {
        $this->total_price[$key] = $this->generateTotal($this->quantity[$key] ?? 0, $this->price[$key] ?? 0);
    }

    public function updatedPrice($value, $key)
    {
        $this->total_price[$key] = $this->generateTotal($this->quantity[$key] ?? 0, $this->price[$key] ?? 0);
    }

    public function updatedTax($value, $key)
    {
        $this->ppn[$key] = $this->generateTax($value ?? 0);
    }

    public function updatedPotonganNominal()
    {
        $this->pph_total = $this->generateDiscount((int)$this->potongan_nominal);
    }

    public function updatedTransactionDate($value)
    {

        $this->due_date = Carbon::parse($value)->addDays(30)->format('Y-m-d');
    }

    public function codeTrasanctionGenerator()
    {
        $transaction = Sales::max('no_transaction');
        $code = 'SL-' . Carbon::now()->format('ymd') . ($transaction+1);
        return $code;
    }

    public function updatedSupplierId()
    {
        $supplier = Contact::find($this->supplier_id);
        $this->address = $supplier->shipping_address;
    }

    public function save()
    {
        $this->validate();
        try {
            \DB::beginTransaction();
            $sale = Sales::create([
                'contact_id' => $this->supplier_id,
                'code' => $this->codeTrasanctionGenerator(),
                'transaction_date' => $this->transaction_date,
                'due_date' => $this->due_date,
                'no_transaction' => $this->no_transaction,
                'no_refrence' => $this->no_refrence,
                'income_tax_type' => $this->potongan,
                'income_tax' => $this->potongan_nominal,
                'remarks' => $this->notes,
                'internal_notes' => $this->message,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);

            $detail_products = [];

            foreach ($this->product as $key => $product){
                if (!empty($product)){
                    $detail_products[] = new SalesDetails([
                        'product' => $product,
                        'description' => $this->description[$key],
                        'quantity' => $this->quantity[$key],
                        'tax' => $this->tax[$key],
                        'price' => $this->price[$key],
                        'total' => $this->total_price[$key],
                    ]);
                }
            }


            $sale->details()->saveMany($detail_products);

            $this->alert('success', 'Berhasil', [
                'text' => 'Data berhasil disimpan',
            ]);
            \DB::commit();
        }catch (\Exception $e){
            \DB::rollBack();
            dd($e);;
            $this->alert('error', 'Gagal', [
                'text' => 'Data gagal disimpan',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.sales.create',[
            'suppliers' => Contact::where('type_contact', 'customer')->orderBy('company_name', 'asc')
                ->where('status', 'active')
                ->get(),
            'taxes' => Account::all(),
        ]);
    }
}
