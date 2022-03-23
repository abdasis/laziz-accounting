<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="card border-top">
        <div class="card-body" style="min-height: 70vh">
            <h4>
                <i class="fe-box"></i>
                KODE PEMBELIAN {{$purchase->code}}
            </h4>

            <div class="row">
                <div class="col-md-4 border-end border-light">
                    <img src="{{Avatar::create($purchase->supplier->company_name)}}" class="d-grid avatar-lg rounded-circle my-2 img-thumbnail mx-auto" alt="">
                    <h5 class="text-center">
                        {{$purchase->supplier->company_name}}
                    </h5>
                    <p class="text-muted text-center">{{$purchase->supplier->email}}</p>
                </div>
                <div class="col-md-8">
                    <form wire:submit.prevent="store">
                        <table class="table table-responsive">
                            <tr>
                                <th>Tanggal Pembelian</th>
                                <th>:</th>
                                <th>{{\Carbon\Carbon::parse($purchase->transaction_date)->format('d-m-Y')}}</th>
                            </tr>
                            <tr>
                                <th>Jatuh Tempo</th>
                                <th>:</th>
                                <th>{{\Carbon\Carbon::parse($purchase->due_date)->format('d-m-Y')}}</th>
                            </tr>
                            <tr>
                                <th>Nomor Transaksi</th>
                                <th>:</th>
                                <th>{{$purchase->no_transaction}}</th>
                            </tr>
                            <tr>
                                <th>Catatan</th>
                                <th>:</th>
                                <th>{{$purchase->remarks}}</th>
                            </tr>
                        </table>
                        <h4>
                            <i class="fe-shopping-cart"></i>
                            Detail Products
                        </h4>
                        <table class="table table-sm">
                            <thead class="bg-light bg-gradient">
                            <tr>
                                <th>#</th>
                                <th>Nama Produk</th>
                                <th>Quantity</th>
                                <th class="text-end">Harga</th>
                                <th class="text-end">Total Harga</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($purchase->details as $key => $detail)
                                <tr>
                                    <th class="align-middle">{{$loop->iteration}}</th>
                                    <td class="align-middle">{{$detail->product->name}}</td>
                                    <td class="align-middle">{{$detail->quantity}}</td>
                                    <td class="text-end align-middle">{{rupiah($detail->total)}}</td>
                                    <td class="text-end align-middle">
                                        <x-form-input name="amount.{{$key}}" class="form-control form-control-sm"/>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td>
                                    <x-form-select name="credit_account" label="Bayar Menggunakan">
                                        <option value="">Pilih Akun</option>
                                        @foreach($accounts as $account)
                                            <option value="{{$account->id}}">{{$account->name}}</option>
                                        @endforeach
                                    </x-form-select>
                                </td>

                                <td>
                                    <div class="form-group">
                                        <label for="">Potongan</label>
                                        <div class="input-group">
                                            <button class="btn input-group-text border btn-light waves-effect waves-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{$title_potongan ?? 'Setor Ke'}}
                                                <i class="fas fa-caret-down ms-1"></i>
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                @foreach($accounts as $key => $account)
                                                    <a wire:click.prevent="$set('account_potongan', {{$account->id}})" class="dropdown-item" href="#">{{$account->name}}</a>
                                                @endforeach
                                            </div>
                                            <input type="text" class="form-control" wire:model="total_discount" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <x-form-textarea name="notes" label="Notes" />
                                </td>
                            </tr>
                        </table>
                        <div class="text-end">
                            <button class="btn btn-light border-bottom rounded fw-bold">
                                <i class="fe-save me-1"></i>
                                Simpan Pembayaran
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="my-2 d-flex justify-content-between">
        <a href="" class="fw-bold text-muted">
            <i class="fe-book-open me-1"></i>
            Riwayat Pembayaran
        </a>
    </div>
</div>
