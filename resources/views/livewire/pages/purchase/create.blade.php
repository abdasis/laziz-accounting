<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="card border-top">
        <div class="card-body">
            <form wire:submit.prevent="save">
                <div class="row mt-2">
                    <div class="col-md-3">
                        <div class="mb-2">
                            <x-form-select name="supplier_id" label="Pilih Supplier">
                                <option value="">Pilih Supplier</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->company_name }}</option>
                                @endforeach
                            </x-form-select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                            <x-form-input label="Tanggal Transaksi" name="transaction_date" type="date"  />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                            <x-form-input label="Jatuh Tempo" name="due_date" type="date" />

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                            <x-form-input label="Nomor Transaksi" name="no_transaction" />

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                            <x-form-textarea label="Alamat Supplier" name="address" placeholder="Masukan Alamat" />
                        </div>
                    </div>
                </div>
                <table class="table table-sm">
                    <thead class="bg-light bg-gradient">
                    <tr>
                        <th>Produk</th>
                        <th>Diskripsi</th>
                        <th>Kuantitas</th>
                        <th>Harga Satuan</th>
                        <th>Pajak</th>
                        <th>Total Harga</th>
                    </tr>
                    </thead>
                    <tbody class="border-light">
                    <tr>
                        <td>
                            <x-form-input name="product.0"/>
                        </td>
                        <td>
                            <x-form-input name="description.0"/>
                        </td>
                        <td width="15">
                            <x-form-input name="quantity.0" type="number"/>
                        </td>
                        <td>
                            <x-form-input name="price.0"/>
                        </td>
                        <td>
                            <x-form-input name="tax.0"/>
                        </td>
                        <td>
                            <x-form-input name="total_price.0"/>
                        </td>
                    </tr>
                    @foreach($inputs as $key => $value)
                        <tr>
                            <td>
                                <x-form-input name="product.{{$value}}"/>
                            </td>
                            <td>
                                <x-form-input name="description.{{$value}}"/>
                            </td>
                            <td width="15">
                                <x-form-input name="quantity.{{$value}}" type="number"/>
                            </td>
                            <td>
                                <x-form-input name="price.{{$value}}"/>
                            </td>
                            <td>
                                <x-form-input name="tax.{{$value}}"/>
                            </td>
                            <td>
                                <x-form-input name="total_price.{{$value}}"/>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">
                    <button wire:click.prevent="addForm({{$i}})" class="btn rounded-3 border-bottom border-secondary btn-secondary width-md">
                        Tambah Produk
                    </button>
                    <button class="btn rounded-3 border-bottom border-primary btn-primary width-md">
                        Simpan Pembelian
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
