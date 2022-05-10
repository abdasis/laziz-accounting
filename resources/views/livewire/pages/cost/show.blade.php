<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="card border-top border-danger">
        <div class="card-header bg-white d-flex justify-content-between">
            <h4>
                <i class="fe-shopping-cart"></i>
                Detail Pengeluaran
            </h4>
            <button class="btn btn-ligh btn-sm border-bottom" data-bs-toggle="modal" data-bs-target="#journal">
                <i class="fe-file-text"></i>
                Lihat Journal
            </button>
        </div>
        <div class="card-body">
            <table class="table table-sm table-hover">
                <tbody>
                <tr>
                    <td>Kode Transaksi</td>
                    <td>:</td>
                    <td>{{$cost->code}}</td>
                </tr>
                <tr>
                    <td>Tgl. Transaksi</td>
                    <td>:</td>
                    <td>{{\Carbon\Carbon::parse($cost->transaction_date)->format('d-m-Y')}}</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>:</td>
                    <td>{{rupiah($cost->total)}}</td>
                </tr>
                <tr>
                    <td>Dibuat Oleh</td>
                    <td>:</td>
                    <td>{{$cost->pembuat->name}}</td>
                </tr>
                </tbody>
            </table>
            <h5>Rincian Transaksi</h5>
            <table class="table table-sm">
                <thead class="bg-light bg-gradient-to-b">
                    <tr>
                        <th>No.</th>
                        <th>Keterangan</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($cost->details as $detail)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$detail->description}}</td>
                        <td>{{rupiah($detail->amount)}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>

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
                <div class="modal-body">
                    <table class="table table-sm table-striped">
                        <thead class="bg-light">
                        <tr>
                            <th>No.</th>
                            <th>Akun</th>
                            <th>Debit</th>
                            <th>Kredit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cost->journal->details as $detail)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$detail->account->name}}</td>
                                <td>{{rupiah($detail->debit)}}</td>
                                <td>{{rupiah($detail->credit)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Paham!</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <a href="{{route('cost.edit', $cost)}}">
                <button class="btn btn-action text-warning">
                    <i class="fe-edit me-1"></i>
                    Sunting
                </button>
            </a>
        </div>
    </div>
</div>
