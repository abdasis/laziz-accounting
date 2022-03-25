<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="card border-top">
        <div class="card-header bg-white d-flex justify-content-between">
            <h4>Transaksi Akun : ({{$account->code}}) {{$account->name}}</h4>

            <a href="">
                <button class="btn btn-light border-bottom">
                    <span class="icon icon-wallet"></span>
                    Perubahan Saldo
                </button>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-nowrap table-hover">
                    <thead class="bg-light bg-gradient">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th></th>
                        <th>Kontak</th>
                        <th>Memo</th>
                        <th class="text-end">Debet</th>
                        <th class="text-end">Kredit</th>
                        <th class="text-end">Saldo</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($account->journals as $key => $jurnal)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$jurnal->journal->transaction_date}}</td>
                            <td>{{$jurnal->journal->contact->company_name}}</td>
                            <td class="text-wrap">{{$jurnal->memo}}</td>
                            <td class="text-end">{{rupiah($jurnal->debit)}}</td>
                            <td class="text-end">{{rupiah($jurnal->credit)}}</td>
                            <td class="text-end">{{rupiah($jurnal->credit)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    @if($account->journals->count() == 0)
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada transaksi</td>
                        </tr>
                    @else
                        <tfoot class="bg-light fw-bolder bg-gradient">
                        <tr>
                            <td colspan="4" class="text-end">Total</td>
                            <td class="text-end">{{rupiah($account->journals->sum('debit'))}}</td>
                            <td class="text-end">{{rupiah($account->journals->sum('credit'))}}</td>
                            <td class="text-end">{{rupiah($account->journals->sum('credit'))}}</td>
                        </tr>
                        </tfoot>

                    @endif

                </table>
            </div>
        </div>
    </div>
</div>
