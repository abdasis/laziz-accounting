<?php

namespace App\Http\Livewire\Sales;

use App\Models\Account;
use App\Models\Contact;
use App\Models\Journal;
use App\Models\JournalDetail;
use App\Models\Product;
use App\Models\Sales;
use App\Models\SalesDetails;
use App\Traits\GeneratePrice;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    use GeneratePrice;

    public $supplier_id, $code, $transaction_date, $due_date, $no_transaction, $no_refrence, $address;

    public $product, $description, $quantity, $unit, $tax, $price, $total_price, $no_reference;

    public $remarks, $internal_notes, $sales_id;

    public $inputs = [], $i = 1;

    public $sub_total;
    public $ppn, $pph_total;
    public $total;
    public $total_tagihan;
    public $potongan;
    public $potongan_nominal;
    public $grand_total;
    public $contact;
    public $day;
    public $status_transaksi;

    public function rules()
    {
        return [
            'supplier_id' => 'required',
            'transaction_date' => 'required',
            'due_date' => 'required',
            'contact.0' => 'required',
            'status_transaksi' => 'required',

            'product.0' => 'required',
            'description.0' => 'required',
            'quantity.0' => 'required',
            'tax.0' => 'required',
            'price.0' => 'required',
            'total_price.0' => 'required',

            'product.*' => 'required',
            'contact.*' => 'required',
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
        return [
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

    public function mount(Sales $sale)
    {
        $this->supplier_id = $sale->contact_id;
        $this->transaction_date = Carbon::parse($sale->transaction_date)->format('Y-m-d');
        $this->due_date = Carbon::parse($sale->due_date)->format('Y-m-d');
        $this->no_transaction = $sale->no_transaction;
        $this->no_reference = $sale->no_refrence;
        $this->address = $sale->customer->shipping_address;
        $this->internal_notes = $sale->internal_notes;
        $this->remarks = $sale->internal_notes;
        $this->status_transaksi = $sale->status;
        foreach ($sale->details as $key => $detail) {
            array_push($this->inputs, $key + 1);
            $this->product[$key] = $detail->product_id;
            $this->description[$key] = $detail->description;
            $this->quantity[$key] = $detail->quantity;
            $this->unit[$key] = $detail->unit;
            $this->tax[$key] = $detail->tax;
            $this->price[$key] = (int)$detail->price;
            $this->day[$key] = $detail->day;
            $this->total_price[$key] = $detail->total;
            $this->contact[$key] = $detail->contact_id;
            $this->ppn[$key] = $this->total_price[$key] * $this->tax[$key] / 100;
        }
        $this->sales_id = $sale->id;

    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function updatedQuantity($value, $key)
    {
        if ($value > 0) {
            $this->total_price[$key] = $this->TotalPrice($this->quantity[$key], $this->price[$key], $this->day[$key]);
            $this->ppn[$key] = $this->TotalPpn($this->total_price[$key], $this->tax[$key]);
        } else {
            $this->quantity[$key] = 0;
            $this->ppn[$key] = 0;
            $this->total_price[$key] = 0;
        }
    }

    public function updatedSupplierId()
    {
        $supplier = Contact::find($this->supplier_id);
        $this->address = $supplier->shipping_address;
    }

    public function updatedProduct($val, $key)
    {
        $product = Product::find($val);

        if ($val) {
            $this->description[$key] = $product->description;
            $this->price[$key] = $product->sales_price;
            $this->tax[$key] = $product->tax;
            $this->quantity[$key] = 0;
            $this->day[$key] = 1;
        } else {
            $this->description[$key] = '';
            $this->price[$key] = 0;
            $this->tax[$key] = 0;
            $this->quantity[$key] = 0;
            $this->day[$key] = 0;
        }
    }

    public function updatedDay($value, $key)
    {
        if ($value > 0) {
            $this->total_price[$key] = $this->TotalPrice($this->quantity[$key], $this->price[$key], $this->day[$key]);
            $this->ppn[$key] = $this->TotalPpn($this->total_price[$key], $this->tax[$key]);
        } else {
            $this->quantity = 0;
            $this->ppn[$key] = 0;
            $this->total_price[$key] = 0;
            $this->day[$key] = 0;
        }
    }

    public function updatedPrice($value, $key)
    {
        if ($value > 0) {
            $this->total_price[$key] = $this->TotalPrice($this->quantity[$key], $this->price[$key], $this->day[$key]);
            $this->ppn[$key] = $this->TotalPpn($this->total_price[$key], $this->tax[$key]);
        } else {
            $this->total_price[$key] = 0;
        }
    }

    public function updatedTax($value, $key)
    {
        if ($value > 0) {
            $this->total_price[$key] = $this->TotalPrice($this->quantity[$key], $this->price[$key], $this->day[$key]);
            $this->ppn[$key] = $this->TotalPpn($this->total_price[$key], $this->tax[$key]);
        } else {
            $this->ppn[$key] = 0;
        }
    }

    public function updatedPotonganNominal()
    {
        $this->pph_total = $this->generateDiscount((int)$this->potongan_nominal);
    }

    public function updatedTransactionDate($value)
    {

        $this->due_date = Carbon::parse($value)->addDays(30)->format('Y-m-d');
    }

    public function save()
    {
        $this->validate();
        try {
            \DB::beginTransaction();
            $sale = Sales::where('id', $this->sales_id)->first();

            $sale->update([
                'contact_id' => $this->supplier_id,
                'transaction_date' => $this->transaction_date,
                'due_date' => $this->due_date,
                'no_transaction' => $this->no_transaction,
                'no_refrence' => $this->no_reference,
                'pph_account' => $this->potongan,
                'income_tax' => $this->potongan_nominal,
                'total_ppn' => collect($this->ppn)->sum(),
                'remarks' => $this->internal_notes,
                'internal_notes' => $this->internal_notes,
                'updated_by' => auth()->user()->id,
                'status' => $this->status_transaksi,
            ]);

            $detail_products = [];

            foreach ($this->product as $key => $product) {
                if (!empty($product) && !empty($this->total_price[$key])) {
                    $detail_products[] = new SalesDetails([
                        'contact_id' => $this->contact[$key] ?? null,
                        'product_id' => $product,
                        'description' => $this->description[$key],
                        'quantity' => $this->quantity[$key],
                        'day' => $this->day[$key],
                        'tax' => $this->tax[$key],
                        'price' => $this->price[$key],
                        'total' => $this->total_price[$key],
                    ]);
                }
            }

            $sale->details()->delete();

            $sale->details()->saveMany($detail_products);

            $last_transaction = Journal::count();

            $number = now()->format('ymd') . '.' . $last_transaction + 1;

            $code_journal = sprintf('JL-%s', $number);

            $journal = Journal::where('no_reference', $sale->code)->first();

            if ($journal){
                $journal->update([
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
            }

            $journal_details = [];

            foreach ($sale->details as $key => $detail) {
                $product = Product::find($detail->product_id);
                array_push($journal_details, new JournalDetail([
                    'account_id' => $product->sale_account,
                    'contact_id' => $this->contact[$key] ?? null,
                    'credit' => $detail->total,
                    'memo' => $detail->description,
                ]));
            }

            $account_ppn = Account::where('code', '217100')->first()->id;

            array_push($journal_details, new JournalDetail([
                'account_id' => $account_ppn,
                'credit' => collect($this->ppn)->sum(),
                'memo' => 'PPn ' . $sale->code,
            ]));

            if ($sale->status == 'dibayar') {
                $account_debet = Account::where('code', '111000')->first()->id;
            } else {
                $account_debet = Contact::where('id', $this->supplier_id)->first()->akun_piutang;
            }

            array_push($journal_details, new JournalDetail([
                    'account_id' => $account_debet,
                    'debit' => collect($journal_details)->sum('credit'),
                    'memo' => 'Penjualan ' . $sale->code,
                ])
            );

            $journal->details()->delete();

            $journal->details()->saveMany($journal_details);

            $this->alert('success', 'Berhasil', [
                'text' => 'Data berhasil disimpan',
            ]);
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e);;
            $this->alert('error', 'Gagal', [
                'text' => 'Data gagal disimpan',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.sales.edit', [
            'contacts' => Contact::latest()->whereIn('type_contact', ['karyawan', 'lainnya'])->get(),
            'suppliers' => Contact::where('type_contact', 'customer')->orderBy('company_name', 'asc')
                ->where('status', 'active')
                ->get(),
            'taxes' => Account::all(),
            'products' => Product::all(),
        ]);
    }
}

