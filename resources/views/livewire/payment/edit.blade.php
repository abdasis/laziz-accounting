<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="card border-light shadow-sm rounded">
        <div class="card-body" style="min-height: 70vh">
            <div class="row justify-content-between">
                <div class="col-md-6">
                    <form wire:submit.prevent="store">
                        <div class="form-group mb-3">
                            <x-form-select name="account" wire:model="account" label="Disetor Ke">
                                <option value="">Pilih Account</option>
                                @foreach($accounts as $account)
                                    <option value="{{$account->id}}">{{$account->name}}</option>
                                @endforeach
                            </x-form-select>
                        </div>
                        <div class="form-group mb-3">
                            <x-form-input type="date" name="payment_date" label="Tanggal Transaksi"/>
                        </div>
                        <div class="form-group mb-3">
                            <x-form-input type="number" name="amount" label="Jumlah"/>
                        </div>
                        <div class="form-group mb-3">
                            <x-form-textarea type="text" name="description" label="Deskripsi"/>
                        </div>
                        <div class="form-group text-end">
                            <button class="btn btn-warning rounded waves-effect ">
                                <i class="fe-save"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5">
                    <h5>Detail Pembayaran</h5>
                    <hr>
                    <table class="table table-borderless table-sm">
                        <tr>
                            <td>Tanggal Transaksi</td>
                            <td>:</td>
                            <td class="text-end">{{\Carbon\Carbon::parse($payment_date)->format('d F, Y')}}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Pembayaran</td>
                            <td>:</td>
                            <td class="text-end">{{rupiah($amount)}}</td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td class="text-end">{{$description}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
