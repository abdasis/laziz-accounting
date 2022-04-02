<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="card border-top">
        <div class="card-header bg-white">
            <h4>Sales Journal</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-hover table-nowrap">
                    <thead class="bg-light bg-gradient">
                    <tr>
                        <th class="align-middle" rowspan="2">Date</th>
                        <th class="align-middle" rowspan="2">No. Doc</th>
                        <th class="align-middle" rowspan="2">Description</th>
                        <th class="align-middle" rowspan="2">Reference</th>
                        <th class="align-middle text-center" colspan="2">Debet</th>
                        <th class="align-middle text-center" colspan="2">Kredit</th>
                        <th rowspan="2" class="align-middle">Remarks</th>
                    </tr>
                    <tr>
                        <th class="align-middle text-center">Piutang</th>
                        <th class="align-middle text-center">HPP</th>
                        <th class="align-middle text-center">Penjualan</th>
                        <th class="align-middle text-center">Persedian Barang Dagang</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($journals as $key => $journal)
                        <tr>
                            <td>{{\Carbon\Carbon::parse($journal->transaction_date)->format('d/m/Y')}}</td>
                            <td>{{$journal->code}}</td>
                            <td>{{$journal->description}}</td>
                            <td>{{$journal->no_reference}}</td>
                            <td class="text-end">{{rupiah($journal->details[1]->debit)}}</td>
                            <td></td>
                            <td class="text-end">{{rupiah($journal->details[1]->debit)}}</td>
                            <td></td>
                            <td>{{$journal->notes}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
