<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="card border-top">
        <div class="card-header d-flex justify-content-between bg-white">
            <h4>{{ __('Biaya Pengeluaran') }}</h4>
            <h4>
                Total: <span class="text-danger">{{rupiah(collect($amount)->sum())}}</span>
            </h4>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <x-form-select name="credit_account" label="Bayar Menggunakan: ">
                            <option value="">Pilih Akun</option>
                            @foreach($accounts as $account)
                                <option value="{{ $account->id }}">{{ $account->name }}</option>
                            @endforeach
                        </x-form-select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <x-form-input name="transaction_date" label="Tanggal Transaksi" type="date"/>
                    </div>
                    <div class="col-md-4 mb-2">
                        <x-form-input-group label="Kode Transaksi" >
                            <x-form-input-group-text>
                                <i class="fe-clipboard"></i>
                            </x-form-input-group-text>
                            <x-form-input name="code" placeholder="Kode Transaksi" id="nickname" />
                        </x-form-input-group>
                    </div>
                    <div class="col-md-4 mb-2">
                        <x-form-textarea name="description" label="Masukan keterangan "/>
                    </div>
                </div>
                <table class="table table-sm mt-3">
                    <thead class="bg-light bg-gradient">
                    <tr>
                        <th>Akun</th>
                        <th>Keterangan</th>
                        <th>Jumlah (IDR)</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td width="30%">
                            <x-form-select name="account_id.0" label="">
                                <option value="">Pilih Akun</option>
                                @foreach($account_debets as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                                @endforeach"></option>
                            </x-form-select>
                        </td>
                        <td width="45%" >
                            <x-form-input name="memo.0"/>
                        </td>
                        <td width="20%">
                            <x-form-input name="amount.0" type="number"/>
                        </td>
                        <td></td>
                    </tr>
                    @foreach($inputs as $key => $input)
                        <tr>
                            <td class="align-middle">
                                <x-form-select name="account_id.{{$input}}" label="">
                                    <option value="">Pilih Akun</option>
                                    @foreach($account_debets as $account)
                                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                                    @endforeach"></option>
                                </x-form-select>
                            </td>
                            <td width="45%" class="align-middle">
                                <x-form-input name="memo.{{$input}}"/>
                            </td>
                            <td width="20%" class="align-middle">
                                <x-form-input name="amount.{{$input}}" type="number"/>
                            </td>
                            <td width="10%" class="text-end align-middle">
                                <button wire:click="removeForm({{$key}})" class="btn btn-sm btn-action">
                                    <i class="fe-minus-circle"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row my-3">
                    <div class="col-md-4 mb-2">
                        <x-form-textarea name="notes" label="Remarks"/>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="button" wire:click.prevent="addForm({{$i}})" class="btn btn-light border-bottom">
                        <i class="fe-layers me-1"></i>
                        Tambah Product
                    </button>
                    <button class="btn btn-primary border-bottom">
                        <i class="fe-save me-1"></i>
                        Simpan Biaya
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
