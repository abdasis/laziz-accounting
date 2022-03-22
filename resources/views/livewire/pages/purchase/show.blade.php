<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="card border-top">
        <div class="card-header bg-white">
            <h4>PEMBELIAN : {{$purchase->code}}</h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 border-light border-end">
                <div class="card-body">
                    <div class="tentang text-center">
                        <div class="d-grid mx-auto">
                            <img src="{{Avatar::create($purchase->supplier->company_name)}}" class="avatar-xl mx-auto" alt="">
                            <h4 class="text-center">{{$purchase->supplier->company_name}}</h4>
                            <p>{{$purchase->supplier->email}} <br> {{$purchase->supplier->phone}}</p>
                        </div>
                    </div>
                    <div class="details">
                        <table class="table table-borderless table-sm">
                            <tr>
                                <td>Contact Person</td>
                                <td>:</td>
                                <td>{{$purchase->supplier->contact_name}}</td>
                            </tr>
                            <tr>
                                <td>NPWP</td>
                                <td>:</td>
                                <td>{{$purchase->supplier->npwp}}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{$purchase->supplier->shipping_address}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="d-grid gap-0">
                        <button class="btn btn-primary">
                            <i class="icon icon-wallet me-1"></i>
                            Kirim Pembayaran
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="text-secondary">Detail Pembelian</h4>
                    <table class="table table-sm table-borderless table-responsive">
                        <tr>
                            <td>Tanggal Pembelian</td>
                            <td>:</td>
                            <td>{{\Carbon\Carbon::parse($purchase->transaction_date)->format('d-m-Y')}}</td>
                        </tr>
                        <tr>
                            <td>Jatuh Tempo</td>
                            <td>:</td>
                            <td>{{\Carbon\Carbon::parse($purchase->due_date)->format('d-m-Y')}}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>
                                <span class="badge badge-outline-info py-1 px-2">
                                    {{$purchase->status}}
                                </span>
                            </td>
                        </tr>
                    </table>
                    <table class="table table-sm table-borderless table-hover">
                        <thead class="bg-light bg-gradient">
                        <tr>
                            <th>#</th>
                            <th>Produk</th>
                            <th>Deskripsi</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Pajak</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($purchase->details as $detail)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$detail->product}}</td>
                                <td width="20%">{{$detail->description}}</td>
                                <td>{{$detail->quantity}}</td>
                                <td class="text-end">{{rupiah($detail->price)}}</td>
                                <td>{{$detail->tax}}%</td>
                                <td class="text-end">{{rupiah($detail->total)}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td  colspan="5"></td>
                                <td class="">Total</td>
                                <td class="text-end">{{rupiah($total)}}</td>
                            </tr>
                            <tr>
                                <td  colspan="5"></td>
                                <td class="">PPn</td>
                                <td class="text-end">{{rupiah($ppn)}}</td>
                            </tr>
                            <tr>
                                <td  colspan="5"></td>
                                <td class="">Subtotal</td>
                                <td class="text-end">{{rupiah($subtotal)}}</td>
                            </tr>
                            <tr>
                                <td  colspan="5"></td>
                                <td class="">PPh</td>
                                <td class="text-end">{{rupiah($pph)}}</td>
                            </tr>

                            <tr>
                                <td  colspan="5"></td>
                                <td class="text-nowrap"><strong>Grand Total</strong></td>
                                <td class="text-end">{{rupiah($grand_total)}}</td>
                            </tr>

                        </tbody>
                    </table>
                    <div class="catatan">
                        <h4 class="text-secondary">Catatan</h4>
                        <p>{{$purchase->internal_notes}}</p>
                    </div>
                    <div class="remarks">
                        <h4 class="text-secondary">Keterangan</h4>
                        <p>{{$purchase->remarks}}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="my-2">
        <div class="d-flex justify-content-between">
            <a href="" wire:click.prevent="delete({{$purchase->id}})">
                <button class="btn btn-action text-danger">
                    <i class="icon icon-trash"></i> Hapus
                </button>
            </a>

            <a href="{{route('purchases.edit', $purchase)}}">
                <button class="btn btn-action text-secondary">
                    <i class="fe-edit me-1"></i>Sunting
                </button>
            </a>
        </div>
    </div>
</div>
