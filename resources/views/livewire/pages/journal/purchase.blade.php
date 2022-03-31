<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="card border-top">
        <div class="card-header bg-white">
            <h4>Sales Journal</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-nowrap table-hover">
                    <thead class="bg-light bg-gradient">
                    <tr>
                        <th class="align-middle" rowspan="2">Date</th>
                        <th class="align-middle" rowspan="2">No. Doc</th>
                        <th class="align-middle" rowspan="2">Description</th>
                        <th class="align-middle" rowspan="2">Reference</th>
                        <th class="align-middle text-center" colspan="3">Debet</th>
                        <th class="align-middle text-center" colspan="3">Kredit</th>
                        <th rowspan="2" class="align-middle">Remarks</th>
                    </tr>
                    <tr>
                        <th class="align-middle text-center">Nama Akun</th>
                        <th class="align-middle text-center">No. Akun</th>
                        <th class="align-middle text-center">Total</th>
                        <th class="align-middle text-center">Nama Akun</th>
                        <th class="align-middle text-center">No. Akun</th>
                        <th class="align-middle text-center">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($journals as $key => $journal)
                        <tr>
                            <td>{{\Carbon\Carbon::parse($journal->transaction_date)->format('d/m/Y')}}</td>
                            <td>{{$journal->code}}</td>
                            <td>{{$journal->notes}}</td>
                            <td>{{$journal->no_reference}}</td>
                            <td>{{$journal->details[0]->account->name}}</td>
                            <td class="text-end">{{number_format($journal->details[0]->account->code,0,'-','-')}}</td>
                            <td class="text-end">{{rupiah($journal->details[0]->debit)}}</td>
                            <td>{{$journal->details[1]->account->name}}</td>
                            <td class="text-end">{{number_format($journal->details[1]->account->code,0,'-','-')}}</td>
                            <td class="text-end">{{rupiah($journal->details[1]->credit)}}</td>
                            <td>{{$journal->description}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No data available in table</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
