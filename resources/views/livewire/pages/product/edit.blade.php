<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="card border-top">
        <div class="card-body">
            <h4 class="card-title mb-3">
                Input Detail Produk
            </h4>
            <div class="row">
                <div class="col-md-7">
                    <form wire:submit.prevent="update">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h4>
                                    <i class="fe-box"></i>
                                    Informasi Produk
                                </h4>
                            </div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-3 fw-bold">
                                Kode Produk
                            </div>
                            <div class="col">
                                <x-form-input type="text" name="code" class="border-0 border-bottom" />
                            </div>
                        </div>

                        <div class="row align-items-center mb-3">
                            <div class="col-md-3 fw-bold">
                                Nama Produk *
                            </div>
                            <div class="col">
                                <x-form-input type="text" name="name" placeholder="Masukan Nama Produk" class="border-0 border-bottom" />
                            </div>
                        </div>

                        <div class="row align-items-center mb-3">
                            <div class="col-md-3 fw-bold">
                                Deskripsi *
                            </div>
                            <div class="col">
                                <x-form-textarea type="text" name="description" placeholder="Masukan Nama Produk" class="border-0 border-bottom" />
                            </div>
                        </div>

                        <div class="row align-items-center mb-3">
                            <div class="col-md-3 fw-bold">
                                Price
                            </div>
                            <div class="col">
                                <x-form-input type="text" name="price" placeholder="Masukan harga" class="border-0 border-bottom" />
                            </div>
                        </div>

                        <div class="row align-items-center mb-3">
                            <div class="col-md-3 fw-bold">
                                PPn
                            </div>
                            <div class="col">
                                <x-form-input type="text" name="tax" placeholder="Jumlah Pajak" class="border-0 border-bottom" />
                            </div>
                        </div>

                        <div class="row ">
                            <h4 class="my-3">
                                <i class="fe-zap"></i>
                                Integrasi Account
                            </h4>
                        </div>

                        <div class="row align-items-center mb-3">
                            <div class="col-md-3 fw-bold">
                                Akun Penjualan *
                            </div>
                            <div class="col">
                                <x-form-select name="sale_account" class="border-0 border-bottom">
                                    <option value="">Pilih Akun Penjualan</option>
                                    @foreach ($accounts as $account)
                                        <option  value="{{ $account->id }}">{{ $account->name }}</option>
                                    @endforeach
                                </x-form-select>
                            </div>
                            <div class="col">
                                <x-form-input name="sales_price" placeholder="Harga Penjualan" class="border-0 border-bottom" />
                            </div>
                        </div>

                        <div class="row align-items-center mb-3">
                            <div class="col-md-3 fw-bold">
                                Akun Pembelian *
                            </div>
                            <div class="col">
                                <x-form-select name="purchase_account" class="border-0 border-bottom">
                                    <option value="">Pilih Akun Pembelian</option>
                                    @foreach ($accounts as $account)
                                        <option  value="{{ $account->id }}">{{ $account->name }}</option>
                                    @endforeach
                                </x-form-select>
                            </div>
                            <div class="col">
                                <x-form-input name="purchase_price" placeholder="Harga Penjualan" class="border-0 border-bottom" />
                            </div>
                        </div>

                        <button class="btn btn-primary width-md float-end">
                            <i class="fe-save me-1"></i>
                            Perbarui
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
