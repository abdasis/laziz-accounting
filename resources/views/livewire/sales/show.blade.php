<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="row">
        <div class="col-md-4">
            <div id="accordion" class="mb-3">
                <div class="card border-light shadow-sm rounded mb-1">
                    <div class="card-header bg-white border-bottom border-light" id="headingOne">
                        <h5 class="m-0">
                            <a class="text-dark collapsed" data-bs-toggle="collapse" href="#collapseOne"
                               aria-expanded="false">
                                <i class="fe-edit me-1 text-primary"></i>
                                Tanggal Dibuat
                            </a>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordion"
                         style="">
                        <div class="card-body bg-soft-light">
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td>Tgl. Dibuat</td>
                                    <td>:</td>
                                    <td>{{\Carbon\Carbon::parse($sales->created_at)->format('d/m/Y H:i')}}</td>
                                </tr>
                                <tr>
                                    <td>Dibuat Oleh</td>
                                    <td>:</td>
                                    <td>{{$sales->creator->name}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card mb-1 border-light shadow-sm">
                    <div class="card-header bg-white border-bottom border-light" id="headingTwo">
                        <h5 class="m-0">
                            <a class="text-dark collapsed" data-bs-toggle="collapse" href="#collapseTwo"
                               aria-expanded="false">
                                <i class="mdi mdi-cash-check me-1 text-primary"></i>
                                Pembayaran
                            </a>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                        <div class="card-body bg-soft-light">
                            <div class="d-grid mb-2">
                                @if($total_payment >= $grand_total)
                                    <div class="alert alert-success">
                                        <i class="mdi mdi-check-circle-outline me-1"></i>
                                        Pembayaran Lunas
                                    </div>
                                @else
                                    <a href="{{route('payment.create', $sales->id)}}"
                                       class="btn btn-action border-light rounded waves-effect shadow-none">
                                        <i class="fe-plus"></i>
                                        Pembayaran
                                    </a>
                                @endif
                            </div>
                            <table class="table table-sm table-borderless">
                                @foreach($payments as $payment)
                                    <tr>
                                        <td>{{\Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y')}}</td>
                                        <td class="text-end">{{rupiah($payment->amount)}}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{route('payment.edit', $payment->id)}}">
                                                    <i class="fe-edit text-primary"></i>
                                                </a>
                                                <a href="#" wire:click.prevent="deletePayment({{$payment->id}})">
                                                    <i class="fe-trash text-danger"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm border-light mb-1">
                    <div class="card-header bg-white border-bottom border-light" id="headingThree">
                        <h5 class="m-0">
                            <a class="text-dark collapsed" data-bs-toggle="collapse" href="#collapseThree"
                               aria-expanded="false">
                                <i class="mdi mdi-help-circle me-1 text-primary"></i>
                                Lainnya
                            </a>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
                        <div class="card-body bg-soft-light">
                           <div class="">
                               <a href="{{route('sales.edit', $sales)}}" class="d-grid">
                                   <button class="btn btn-light text-warning border-light rounded waves-effect text-secondary mb-2 ">
                                       <i class="fe-edit me-1"></i>Sunting
                                   </button>
                               </a>
                               <a class="d-grid" href="{{route('sales.invoice', $sales)}}">
                                   <button class="btn btn-success waves-effect mb-2">
                                       <i class="fe-printer"></i>
                                       Print Invoice
                                   </button>
                               </a>
                               <a href="" class="d-grid" wire:click.prevent="delete({{$sales->id}})">
                                   <button class="btn btn-danger shadow-none waves-effect shadow-none">
                                       <i class="fe-trash-2"></i> Hapus
                                   </button>
                               </a>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm border-light">
                <div class="card-header border-bottom border-light bg-white d-flex justify-content-between">
                    <h5 class="mb-0">Detail Penjualan</h5>
                    <div>
                        <button class="btn btn-light rounded-3 btn-sm shadow-none waves-effect border-bottom"
                                data-bs-toggle="modal" data-bs-target="#journal">
                            <i class="fe-file-text"></i>
                            Lihat Journal
                        </button>
                    </div>
                </div>
                <div class="card-body bg-soft-light">
                    <table class="table table-sm table-borderless text-wrap table-responsive">
                        <tr>
                            <th width="20%">Customer</th>
                            <td>:</td>
                            <td>{{$sales->contact->company_name}}</td>
                        </tr>
                        <tr>
                            <th width="20%">Tgl. Transaksi</th>
                            <td>:</td>
                            <td>{{\Carbon\Carbon::parse($sales->transaction_date)->format('d F, Y')}}</td>
                        </tr>
                        <tr>
                            <th>Tgl. Jatuh Tempo</th>
                            <td>:</td>
                            <td>{{\Carbon\Carbon::parse($sales->due_date)->format('d F, Y')}}</td>
                        </tr>
                        <tr>
                            <th>Nomor Invoice</th>
                            <td>:</td>
                            <td>{{$sales->no_transaction}}
                                /INV/SOKA-R/{{getRoman(\Carbon\Carbon::parse($sales->transaction_date)->format('m'))}}
                                /{{\Carbon\Carbon::parse($sales->transaction_date)->format('Y')}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:</td>
                            <td>{{Str::title($sales->status)}}</td>
                        </tr>
                    </table>
                    <table class="table table-sm table-nowrap table-hover">
                        <thead class="bg-light bg-gradient">
                        <tr>
                            <th>#</th>
                            <th>Produk</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Qty</th>
                            <th class="text-center">Hari</th>
                            <th class="text-center">Pajak</th>
                            <th class="text-end">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sales->details as $detail)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$detail->product->name}}</td>
                                <td width="20%">{{$detail->description}}</td>
                                <td class="text-center">{{$detail->quantity}}</td>
                                <td class="text-center">{{$detail->day}}</td>
                                <td class="text-center">{{$detail->tax}}%</td>
                                <td class="text-end">{{rupiah($detail->total)}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5"></td>
                            <td class="text-end">Subtotal</td>
                            <td class="text-end">{{rupiah($total)}}</td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td class="text-end">PPn</td>
                            <td class="text-end">{{rupiah(collect($ppn)->sum())}}</td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td class="text-end">PPh</td>
                            <td class="text-end">{{rupiah($pph)}}</td>
                        </tr>

                        <tr>
                            <td colspan="5"></td>
                            <td class="text-end text-nowrap"><strong>Grand Total</strong></td>
                            <td class="text-end">{{rupiah($grand_total)}}</td>
                        </tr>

                        <tr>
                            <td colspan="5"></td>
                            <td class="text-end text-nowrap"><strong>Total Dibayar</strong></td>
                            <td class="text-end">{{rupiah($total_payment)}}</td>
                        </tr>

                        </tbody>
                    </table>
                    <div class="remarks">
                        <h4 class="text-secondary">Keterangan</h4>
                        <p>{{$sales->remarks}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--modal untuk meanmpilkan journal--}}
    <div class="modal fade" id="journal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header border-bottom border-light">
                    <h5 class="modal-title" id="staticBackdropLabel">Detail Journal</h5>
                    <button type="button" class="btn-light btn-sm fw-bold btn border-bottom" data-bs-dismiss="modal"
                            aria-label="Close">
                        Esc
                    </button>
                </div>
                <div class="modal-body bg-soft-light">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Akun</th>
                            <th class="text-end">Debit</th>
                            <th class="text-end">Kredit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sales->journal->details as $detail)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$detail->account->name}}</td>
                                <td class="text-end">{{rupiah($detail->debit)}}</td>
                                <td class="text-end">{{rupiah($detail->credit)}}</td>
                            </tr>
                        @endforeach
                        <tr class="table-light">
                            <th>#</th>
                            <th>Total</th>
                            <th class="text-end">{{rupiah($sales->journal->details->sum('debit'))}}</th>
                            <th class="text-end">{{rupiah($sales->journal->details->sum('credit'))}}</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
