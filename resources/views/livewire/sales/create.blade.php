<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div>
        {{-- Care about people's approval and you will be their prisoner. --}}
        <div class="card shadow-sm border-light">
            <div class="card-header bg-white border-bottom border-light">
                <h5 class="card-title mb-0">
                    <i class="fe-shopping-cart"></i>
                    Penjualan Baru
                </h5>
            </div>
            <div class="card-body">

                <form wire:submit.prevent="save">
                    <div class="row my-3">
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
                            <div class="form-group">
                                <x-form-select name="status_transaksi" label="Status Pembayaran">
                                    <option value="">Pilih Status</option>
                                    <option value="dibayar">Bayar Sekarang</option>
                                    <option value="belum dibayar">Bayar Nanti</option>
                                </x-form-select>
                            </div>
                        </div>
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
                        <div class="col-md-3"></div>

                    </div>
                    <table class="table table-sm table-nowrap">
                        <thead class="bg-soft-light">
                        <tr>
                            <th>Produk</th>
                            <th>Kontak</th>
                            <th>Diskripsi</th>
                            <th>Unit</th>
                            <th>Hari</th>
                            <th>PPn(%)</th>
                            <th class="text-end">Harga Satuan</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="border-light">
                        @foreach($inputs as $key => $value)
                            <tr>
                                <td class="align-middle">
                                    <x-form-select name="product.{{$key}}">
                                        <option value="">Pilih Produk</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </x-form-select>
                                </td>
                                <td class="align-middle">
                                    <x-form-select name="contact.{{$key}}">
                                        <option value="">Pilih Contact</option>
                                        @foreach($contacts as $contact)
                                            <option value="{{ $contact->id }}">{{ $contact->contact_name }}</option>
                                        @endforeach
                                    </x-form-select>
                                </td>
                                <td class="align-middle">
                                    <x-form-textarea rows="1" name="description.{{$key}}"/>
                                </td>
                                <td class="align-middle" width="10%">
                                    <x-form-input name="quantity.{{$key}}" type="number"/>
                                </td>
                                <td class="align-middle" width="10%">
                                    <x-form-input name="day.{{$key}}" type="number"/>
                                </td>
                                <td class="align-middle" width="10%">
                                    <x-form-input name="tax.{{$key}}" type="number"/>
                                </td>
                                <td class="align-middle" width="15%">
                                    <x-form-input class="text-end" type="number" name="price.{{$key}}"/>
                                </td>
                                <td class="align-middle">
                                    <button wire:click.prevent="removeForm({{$key}})" class="btn btn-action shadow-none">
                                        <i class="fe-trash-2"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="7" class="text-center">
                                <button wire:click.prevent="addForm({{$i}})" class="btn btn-action border-light shadow-none btn-sm waves-effect">
                                    <i class="fe-file-plus"></i>
                                    Item Baru
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="row justify-content-between">
                        <div class="col-md-4">
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
                    <div class="d-flex justify-content-end mt-2">
                        <div class="tombol-kanan d-flex align-items-baseline gap-3">
                            <button class="btn rounded-3 border-bottom border-warning btn-warning width-md">
                                <i class="fe-save"></i>
                                Simpan
                            </button>
                        </div>
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
