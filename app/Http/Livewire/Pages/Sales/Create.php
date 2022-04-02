<?php

namespace App\Http\Livewire\Pages\Sales;

use App\Models\Account;
use App\Models\Contact;
use App\Models\Journal;
use App\Models\JournalDetail;
use App\Models\Product;
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

    public $product, $description, $quantity, $unit, $tax, $price, $total_price, $no_reference;

    public $remarks, $internal_notes;

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
            'no_reference.*' => 'required',

        ];
    }

    public function messages()
    {
        return[
            'product.0.required' => 'Product is required',
            'description.0.required' => 'Description is required',
            'quantity.0.required' => 'Quantity is required',
            'tax.0.required' => 'Tax is required',
            'price.0.required' => 'Price is required',
            'total_price.0.required' => 'Total Price is required',

            'product.*.required' => 'Product is required',
            'description.*.required' => 'Description is required',
            'quantity.*.required' => 'Quantity is required',
            'tax.*.required' => 'Tax is required',
            'price.*.required' => 'Price is required',
            'total_price.*.required' => 'Total Price is required',

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
        $this->ppn[$key] = $this->generateTax($this->tax[$key] ?? 0);

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
        $last_transaction = Sales::max('no_transaction');
        $number = now()->format('ymd') . '.' .$last_transaction+1;
        $text = sprintf('SL-%s', $number);
        return $text;

    }

    public function updatedSupplierId()
    {
        $supplier = Contact::find($this->supplier_id);
        $this->address = $supplier->shipping_address;
    }

    public function updatedProduct($val, $key)
    {
        $product = Product::find($val);
        $this->description[$key] = $product->description;
        $this->price[$key] = $product->sales_price;
        $this->tax[$key] = $product->tax;
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
                'remarks' => $this->remarks,
                'internal_notes' => $this->internal_notes,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);

            $detail_products = [];

            foreach ($this->product as $key => $product){
                if (!empty($product[$key]) && !empty($this->total_price[$key])){
                    $detail_products[] = new SalesDetails([
                        'product_id' => $product,
                        'description' => $this->description[$key],
                        'quantity' => $this->quantity[$key],
                        'tax' => $this->tax[$key],
                        'price' => $this->price[$key],
                        'total' => $this->total_price[$key],
                    ]);


                }
            }

            $sale->details()->saveMany($detail_products);

            //membuat journal untuk penjualan

            //membuat kode journal

            $last_transaction = Journal::count();

            $number = now()->format('ymd') . '.' .$last_transaction+1;

            $code_journal = sprintf('JL-%s', $number);

            $journal = Journal::create([
                'code' => $code_journal,
                'name' => 'Penjualan Kode' . $sale->code,
                'transaction_date' => $sale->transaction_date,
                'description' => $sale->remarks,
                'notes' => $sale->internal_notes,
                'total' => $sale->total,
                'status' => 'draft',
                'no_reference' => $sale->code,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);

            //membuat journal detail untuk penjualan
            $journal_details = [];

            foreach ($sale->details as $detail){
                $product = Product::find($detail->product_id);
                $journal_details[] = new JournalDetail([
                    'account_id' => $product->sale_account,
                    'debit' => $product->purchase_price * $detail->quantity,
                    'credit' => 0,
                    'memo' => "Beban pokok pendapatan " . $detail->description,
                ]);
            }

            /*membuat journal untuk ppn pengeluaran*/
            $account_ppn = Account::where('code' , '217100')->first()->id;

            $ppn = $sale->details->sum('tax');

            $price_total = $sale->details->sum('total');

            $total_ppn = $price_total * ($ppn / 100);

            $journal_details[] = new JournalDetail([
                'account_id' => $sale->customer->akun_piutang,
                'debit' => $price_total + $total_ppn,
                'credit' => 0,
                'memo' => 'Piutang usaha penjualan ' . $sale->code,
            ]);



            $journal_details[] = new JournalDetail([
                'account_id' => $account_ppn,
                'credit' => $total_ppn,
                'memo' => 'PPn Keluaran '.$sale->code,
            ]);


            /*membuat journal untuk persediaan barang*/
            foreach ($sale->details as $detail){
                $product = Product::find($detail->product_id);
                $journal_details[] = new JournalDetail([
                    'account_id' => $product->sales_price,
                    'credit' => $product->purchase_price * $detail->quantity,
                    'memo' => 'Persediaan barang ' . $detail->description,
                ]);
            }

            $account_pendapatan = Account::where('code' , '410000')->first()->id;


            $journal_details[] = new JournalDetail([
                'account_id' => $account_pendapatan,
                'credit' => $sale->details->sum('total'),
                'memo' => 'Pendapatan usaha  '.$sale->code,
            ]);


            $journal->details()->saveMany($journal_details);

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
            'products' => Product::all(),
        ]);
    }
}
