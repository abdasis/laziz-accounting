<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="card border-top">
        <div class="card-body">
            <div class="row mt-2">
                <div class="col-md-3">
                    <div class="mb-2">
                        <x-form-select name="supplier">
                            <option value="">Pilih Supplier</option>
                        </x-form-select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-2">
                        <x-form-select name="supplier">
                            <option value="">Pilih Supplier</option>
                        </x-form-select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-2">
                        <x-form-select name="supplier">
                            <option value="">Pilih Supplier</option>
                        </x-form-select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-2">
                        <x-form-select name="supplier">
                            <option value="">Pilih Supplier</option>
                        </x-form-select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-2">
                        <x-form-textarea name="address" placeholder="Masukan Alamat" />
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
                        <x-form-input name="product"/>
                    </td>
                    <td>
                        <x-form-input name="description"/>
                    </td>
                    <td width="15">
                        <x-form-input name="qty" type="number"/>
                    </td>
                    <td>
                        <x-form-input name="price"/>
                    </td>
                    <td>
                        <x-form-input name="tax"/>
                    </td>
                    <td>
                        <x-form-input name="total_price"/>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-between">
                <button class="btn btn-secondary">
                    Tambah Produk
                </button>
                <button class="btn btn-primary">
                    Simpan Pembelian
                </button>
            </div>
        </div>
    </div>
</div>
