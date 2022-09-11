<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="card shadow-sm border-light">
        <div class="card-header border-bottom border-light bg-white d-flex justify-content-between">
            <h4>PEMBELIAN : {{$sales->no_transaction}}/INV/SOKA-R/{{getRoman(\Carbon\Carbon::parse($sales->transaction_date)->format('m'))}}/{{\Carbon\Carbon::parse($sales->transaction_date)->format('Y')}}</h4>
            <button class="btn btn-light rounded-3 border-bottom" data-bs-toggle="modal" data-bs-target="#journal">
                <i class="fe-file-text"></i>
                Lihat Journal
            </button>
        </div>
        <div class="card-body bg-soft-light">
            <table class="table table-sm table-borderless text-wrap table-responsive">
                <tr>
                    <th width="20%">Customer</th>
                    <td>:</td>
                    <td>{{$sales->contact->company_name}}</td>
                </tr>
                <tr>
                    <th width="20%">Tanggal Pembelian</th>
                    <td>:</td>
                    <td>{{\Carbon\Carbon::parse($sales->transaction_date)->format('d F, Y')}}</td>
                </tr>
                <tr>
                    <th>Jatuh Tempo</th>
                    <td>:</td>
                    <td>{{\Carbon\Carbon::parse($sales->due_date)->format('d F, Y')}}</td>
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
                    <th class="text-end">Harga</th>
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
                        <td class="text-end">{{rupiah($detail->price)}}</td>
                        <td class="text-center">{{$detail->tax}}%</td>
                        <td class="text-end">{{rupiah($detail->total)}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td  colspan="6"></td>
                    <td class="text-end">Total</td>
                    <td class="text-end">{{rupiah($total)}}</td>
                </tr>
                <tr>
                    <td  colspan="6"></td>
                    <td class="text-end">PPn</td>
                    <td class="text-end">{{rupiah($ppn)}}</td>
                </tr>
                <tr>
                    <td  colspan="6"></td>
                    <td class="text-end">Subtotal</td>
                    <td class="text-end">{{rupiah($subtotal)}}</td>
                </tr>
                <tr>
                    <td  colspan="6"></td>
                    <td class="text-end">PPh</td>
                    <td class="text-end">{{rupiah($pph)}}</td>
                </tr>

                <tr>
                    <td  colspan="6"></td>
                    <td class="text-end text-nowrap"><strong>Grand Total</strong></td>
                    <td class="text-end">{{rupiah($grand_total)}}</td>
                </tr>

                </tbody>
            </table>
            <div class="catatan">
                <h4 class="text-secondary">Catatan</h4>
                <p>{{$sales->internal_notes}}</p>
            </div>
            <div class="remarks">
                <h4 class="text-secondary">Keterangan</h4>
                <p>{{$sales->remarks}}</p>
            </div>
        </div>
    </div>

    {{--modal untuk meanmpilkan journal--}}
    <div class="modal fade" id="journal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header border-bottom border-light">
                    <h5 class="modal-title" id="staticBackdropLabel">Detail Journal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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


    <div class="my-2">
        <div class="d-flex justify-content-between">
            <a href="" wire:click.prevent="delete({{$sales->id}})">
                <button class="btn btn-action text-danger">
                    <i class="icon icon-trash"></i> Hapus
                </button>
            </a>
            <a href="{{route('sales.invoice', $sales)}}">
                <button class="btn btn-danger rounded waves-effect">
                    <i class="fa fa-file-pdf"></i>
                    Print Invoice
                </button>
            </a>
            <a href="{{route('sales.edit', $sales)}}">
                <button class="btn btn-light text-secondary ">
                    <i class="fe-edit me-1"></i>Sunting
                </button>
            </a>
        </div>
    </div>
</div>
