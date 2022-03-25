<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div>
        {{-- Care about people's approval and you will be their prisoner. --}}
        <div class="card border-top">
            <div class="card-body">
                <h3 class="card-title mb-3">
                    Pencatatan Penjualan
                </h3>
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
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="border-light">
                        <tr>
                            <td>
                                <x-form-select name="product.0">
                                    <option value="">Pilih Produk</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </x-form-select>
                            </td>
                            <td>
                                <x-form-input name="description.0"/>
                            </td>
                            <td width="10%">
                                <x-form-input name="quantity.0" type="number"/>
                            </td>
                            <td>
                                <x-form-input name="price.0"/>
                            </td>
                            <td width="10%">
                                <x-form-input name="tax.0" type="number"/>
                            </td>
                            <td>
                                <x-form-input name="total_price.0"/>
                            </td>
                        </tr>
                        @foreach($inputs as $key => $value)
                            <tr>
                                <td>
                                    <x-form-select name="product.{{$value}}">
                                        <option value="">Pilih Produk</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </x-form-select>
                                </td>
                                <td>
                                    <x-form-input name="description.{{$value}}"/>
                                </td>
                                <td width="10%">
                                    <x-form-input name="quantity.{{$value}}" type="number"/>
                                </td>
                                <td>
                                    <x-form-input name="price.{{$value}}"/>
                                </td>
                                <td width="10%">
                                    <x-form-input name="tax.{{$value}}" type="number"/>
                                </td>
                                <td>
                                    <x-form-input name="total_price.{{$value}}"/>
                                </td>
                                <td>
                                    <button wire:click.prevent="removeForm({{$key}})" class="btn btn-action">
                                        <i class="ti ti-minus"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row justify-content-between">
                        <div class="col-md-4">
                            <div class="mb-2">
                                <x-form-textarea label="Catatan" name="notes" placeholder="Masukan Catatan" />
                            </div>
                            <div class="mb-2">
                                <x-form-textarea label="Keterangan" name="message" placeholder="Masukan Keterangan" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td>:</td>
                                    <td class="text-end">{{rupiah(collect($total_price)->sum() ?? 0)}}</td>
                                </tr>
                                <tr>
                                    <td><strong>PPn</strong></td>
                                    <td>:</td>
                                    <td class="text-end">{{rupiah(collect($ppn)->sum() ?? 0)}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Subtotal</strong></td>
                                    <td>:</td>
                                    <td class="text-end">{{rupiah(collect($total_price)->sum() + collect($ppn)->sum() ?? 0)}}</td>
                                </tr>
                                <tr>
                                    <td wire:ignore>
                                        <x-form-select id="potongan" name="potongan" class="form-select form-select-sm" data-toggle="select2" data-placeholder="PPh">
                                            <option value="">Pilih Pajak</option>
                                            @foreach($taxes as $tax)
                                                <option value="{{$tax->name}}">{{$tax->name}}</option>
                                            @endforeach
                                        </x-form-select>
                                    </td>
                                    <td class="align-middle">:</td>
                                    <td class="text-end">
                                        <div class="input-group">
                                            <input wire:model="potongan_nominal" type="text" class="form-control" placeholder="Potongan" aria-label="Username" aria-describedby="basic-addon1">
                                            <span class="input-group-text" id="basic-addon1">%</span>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Total Tagihan</th>
                                    <th>:</th>
                                    <th class="text-end">{{rupiah(collect($total_price)->sum() + collect($ppn)->sum() - $pph_total)}}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <button wire:click.prevent="addForm({{$i}})" class="btn rounded-3 border-bottom border-secondary btn-secondary width-md">
                            <i class="icon icon-plus me-1"></i>

                            Tambah Produk
                        </button>
                        <button class="btn rounded-3 border-bottom border-primary btn-primary width-md">
                            Simpan Penjualan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $('#potongan').on('change', function (event){
                @this.set('potongan', event.target.value)
            })
        </script>
    @endpush

</div>
