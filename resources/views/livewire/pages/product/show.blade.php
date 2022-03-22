<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card">
        <div class="card-body">
            <h4 class="card-title d-flex justify-content-between">
                <span>
                    {{ $product->name }} <br>
                    <small>{{$product->code}}</small>
                </span>
                <a href="{{route('products.edit', $product)}}">
                    <button class="btn btn-light border-bottom rounded-3 ">
                        <i class="fe-edit"></i>
                        Ubah Product
                    </button>
                </a>
            </h4>

            <div class="row">
                <div class="col-md-7">
                    <h4>
                        <i class="fe-shopping-bag"></i>
                        Informasi Product
                    </h4>
                    <table class="table table-sm table-responsive">
                        <tbody>
                        <tr>
                            <td>Nama Product</td>
                            <td>:</td>
                            <td>{{$product->name}}</td>
                        </tr>
                        <tr class="">
                            <td>Kode Product</td>
                            <td>:</td>
                            <td>{{$product->code}}</td>
                        </tr>
                        <tr>
                            <td>Deskripsi Product</td>
                            <td>:</td>
                            <td>{{$product->description}}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-4 p-2 m-3 rounded bg-light bg-gradient">
                    <h4>
                        <i class="fe-credit-card"></i>
                        Informasi Harga
                    </h4>
                    <span class="harga">
                        <strong>
                            Harga Product
                        </strong>
                        <p>{{rupiah($product->price)}}</p>
                    </span>
                    <span class="account">
                        <strong>
                            Account Penjualan
                        </strong>
                        <p>{{$product->saleAccount->name}}</p>
                    </span>
                    <span class="account">
                        <strong>
                            Account Pembelian
                        </strong>
                        <p>{{$product->purchaseAccount->name}}</p>
                    </span>
                </div>
            </div>

            <div class="row">
                <h4 class="">
                    <i class="fe-activity"></i>
                    Transaksi Pada Product Ini
                </h4>
                <div class="col-md-7">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Customer</th>
                                <th>Quantity</th>
                                <th>Total Harga</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex my-4">
        <button wire:click.prevent="delete({{$product->id}})" class="btn btn-action text-danger">
            <i class="fe-trash"></i>
            Hapus Product
        </button>
    </div>
</div>
