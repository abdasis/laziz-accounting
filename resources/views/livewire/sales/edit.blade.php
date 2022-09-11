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
                                <x-form-input-group label="No. Transaksi" >
                                    <x-form-input-group-text>
                                        <i class="fe-activity"></i>
                                    </x-form-input-group-text>
                                    <x-form-input  name="no_transaction" />
                                </x-form-input-group>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-2">
                                <x-form-textarea label="Alamat Supplier" name="address" placeholder="Masukan Alamat" />
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="mb-2">
                                <x-form-input-group label="No. Referensi" >
                                    <x-form-input-group-text>
                                        <i class="fe-file-text"></i>
                                    </x-form-input-group-text>
                                    <x-form-input name="no_reference" placeholder="No Referensi" id="no_refenrence" />
                                </x-form-input-group>
                            </div>
                        </div>
                    </div>
                    <table class="table table-sm">
                        <thead class="table-dark">
                        <tr>
                            <th>Produk</th>
                            <th>Kontak</th>
                            <th>Diskripsi</th>
                            <th>Unit</th>
                            <th>Hari</th>
                            <th>Harga Satuan</th>
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
                                <x-form-select name="contact.0">
                                    <option value="">Pilih Contact</option>
                                    @foreach($contacts as $contact)
                                        <option value="{{ $contact->id }}">{{ $contact->contact_name }}</option>
                                    @endforeach
                                </x-form-select>
                            </td>
                            <td>
                                <x-form-input name="description.0"/>
                            </td>
                            <td width="10%">
                                <x-form-input name="quantity.{{0}}" type="number"/>
                            </td>
                            <td width="10%">
                                <x-form-input name="day.{{0}}" type="number"/>
                            </td>
                            <td width="10%">
                                <x-form-input name="tax.{{0}}" start="11" type="number"/>
                            </td>
                            <td>
                                <x-form-input class="text-end" name="price.0"/>
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
                                    <x-form-select name="contact.{{$value}}">
                                        <option value="">Pilih Contact</option>
                                        @foreach($contacts as $contact)
                                            <option value="{{ $contact->id }}">{{ $contact->contact_name }}</option>
                                        @endforeach
                                    </x-form-select>
                                </td>
                                <td>
                                    <x-form-input name="description.{{$value}}"/>
                                </td>
                                <td width="10%">
                                    <x-form-input name="quantity.{{$value}}" type="number"/>
                                </td>
                                <td width="10%">
                                    <x-form-input name="day.{{$value}}" type="number"/>
                                </td>
                                <td width="10%">
                                    <x-form-input name="tax.{{$value}}" start="11" type="number"/>
                                </td>
                                <td width="10%">
                                    <x-form-input class="text-end" name="price.{{$value}}"/>
                                </td>
                                <td>
                                    <button wire:click.prevent="removeForm({{$key}}, {{$value}})" class="btn btn-action">
                                        <i class="fe-minus-circle text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row justify-content-between">
                        <div class="col-md-4">
                            <div class="mb-2">
                                <x-form-textarea label="Remark" name="remarks" placeholder="Tulis Remark" />
                            </div>
                            <div class="mb-2">
                                <x-form-textarea label="Keterangan Penjualan" name="internal_notes" placeholder="Masukan Keterangan" />
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
                        <button wire:click.prevent="addForm({{$i}})" class="btn rounded-3 border-bottom btn-light width-md">
                            <i class="icon icon-plus me-1"></i>
                            Tambah Produk
                        </button>
                        <button class="btn rounded-3 border-bottom border-primary btn-primary width-md">
                            <i class="fe-save"></i>
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
