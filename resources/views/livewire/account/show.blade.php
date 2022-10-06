<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="card shadow-sm border-light">
        <div class="card-header bg-white d-flex justify-content-between border-bottom border-light">
            <h5 class="my-1">
                <i class="mdi mdi-book-account"></i>
                Buku Besar: {{$account->name}}</h5>
        </div>
        <div class="card-body bg-soft-light my-0">
            <form wire:submit.prevent="filter">
                <div class="row mb-3 align-items-end">
                    <div class="col-md-3" wire:ignore>
                        <input type="text" id="range-datepicker" class="form-control border-light shadow-sm bg-white flatpickr-input active priode" placeholder="2018-10-03 to 2018-10-10" readonly="readonly">
                    </div>
                    <div class="col-md-3">
                        <x-form-select name="contact" class="border-light rounded shadow-sm">
                            <option value="">Pilih Contact</option>
                            @foreach($contacts as $contact)
                                <option value="{{$contact->id}}">{{$contact->company_name}}</option>
                            @endforeach
                        </x-form-select>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary shadow-none waves-effect rounded">
                            <i class="fe-filter"></i>
                            Filter
                        </button>
                    </div>

                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-sm table-nowrap table-hover">
                    <thead class="bg-light bg-gradient">
                    <tr>
                        <th class="text-center">No</th>
                        <th>Tanggal</th></th>
                        <th>Kontak</th>
                        <th>Memo</th>
                        <th class="text-end">Debet</th>
                        <th class="text-end">Kredit</th>
                        <th class="text-end">Saldo</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($journals as $key => $jurnal)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{\Carbon\Carbon::parse($jurnal['transaction_date'])->format('d/m/Y')}}</td>
                            <td>{{$jurnal['contact']}}</td>
                            <td class="text-wrap">{{$jurnal['description']}}</td>
                            <td class="text-end">{{rupiah($jurnal['debet'])}}</td>
                            <td class="text-end">{{rupiah($jurnal['credit'])}}</td>
                            <td class="text-end">{{rupiah($jurnal['credit'])}}</td>
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
                            <td class="text-end">{{rupiah(collect($journals)->sum('debet'))}}</td>
                            <td class="text-end">{{rupiah(collect($journals)->sum('credit'))}}</td>
                            <td class="text-end">{{rupiah(collect($journals)->sum('debet') - collect($journals)->sum('credit'))}}</td>
                        </tr>
                        </tfoot>

                    @endif

                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.priode').on('change', function (e) {
                @this.set('priode_date', e.target.value);
            });
        });
    </script>

@endpush
