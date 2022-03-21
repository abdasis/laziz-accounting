<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="card border-top">
        <div class="card-body">
            <h4 class="card-title mb-3">
                Tambah Contact Baru
            </h4>
            <form wire:submit.prevent="simpan">
                <div class="row">
                    <div class="col-md-7">
                        <table class="table table-borderless">
                            <tr>
                                <td colspan="3">
                                    <h4 class="">
                                        <i class="icon icon-home"></i>
                                        Info Umum
                                    </h4>
                                </td>
                            </tr>
                            <tr>
                                <th class="align-middle">Nama Perusahaan</th>
                                <td class="align-middle">:</td>
                                <td class="align-middle">
                                    <x-form-input name="company_name" class="border-0 border-bottom" placeholder="Masukan Nama Perusahaan" />
                                </td>
                            </tr>
                            <tr>
                                <th class="align-middle">Contact Person</th>
                                <td class="align-middle">:</td>
                                <td class="align-middle">
                                    <x-form-input name="nick_name" class="border-0 border-bottom" placeholder="Masukan Nama Perusahaan" />
                                </td>
                            </tr>
                            <tr>
                                <th>Jenis Kontak</th>
                                <td>:</td>
                                <td>
                                    <x-form-group name="type_contact" inline>
                                        <x-form-radio name="type_contact" value="customer" label="Customer" />
                                        <x-form-radio name="type_contact" value="supplier" label="Supplier" />
                                        <x-form-radio name="type_contact" value="karyawan" label="Karyawan" />
                                        <x-form-radio name="type_contact" value="lainnya" label="Lainnya" />
                                    </x-form-group>
                                </td>
                            </tr>
                            <tr>
                                <th class="align-middle">Handphone</th>
                                <td class="align-middle">:</td>
                                <td class="align-middle">
                                    <x-form-input name="handphone" class="border-0 border-bottom" />
                                </td>
                            </tr>

                            <tr>
                                <th class="align-middle">Email</th>
                                <td class="align-middle">:</td>
                                <td class="align-middle">
                                    <x-form-input name="email" class="border-0 border-bottom" />
                                </td>
                            </tr>

                            <tr>
                                <th class="align-middle">Fax</th>
                                <td class="align-middle">:</td>
                                <td class="align-middle">
                                    <x-form-input name="fax" class="border-0 border-bottom" />
                                </td>
                            </tr>

                            <tr>
                                <th class="align-middle">NPWP</th>
                                <td class="align-middle">:</td>
                                <td class="align-middle">
                                    <x-form-input name="npwp" class="border-0 border-bottom" />
                                </td>
                            </tr>

                            <tr>
                                <th class="align-middle">Alamat</th>
                                <td class="align-middle">:</td>
                                <td class="align-middle">
                                    <x-form-textarea name="shipping_address" class="border-0 border-bottom" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <h4 class="">
                                        <i class="icon icon-wallet"></i>
                                        <span>Bank Account</span>
                                    </h4>
                                </td>
                            </tr>
                            <tr>
                                <th class="align-middle">Bank</th>
                                <td class="align-middle">:</td>
                                <td class="align-middle">
                                    <x-form-input name="bank_name" class="border-0 border-bottom" />
                                </td>
                            </tr>
                            <tr>
                                <th class="align-middle">Nomor Bank</th>
                                <td class="align-middle">:</td>
                                <td class="align-middle">
                                    <x-form-input name="bank_account_number" class="border-0 border-bottom" />
                                </td>
                            </tr>
                            <tr>
                                <th class="align-middle">Pemilik Rekening</th>
                                <td class="align-middle">:</td>
                                <td class="align-middle">
                                    <x-form-input name="bank_account_name" class="border-0 border-bottom" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <h4 class="">
                                        <i class="ti ti-agenda"></i>
                                        Integrasi Jurnal
                                    </h4>
                                </td>
                            </tr>
                            <tr>
                                <th class="align-middle">Akun Hutang</th>
                                <td class="align-middle">:</td>
                                <td class="align-middle">
                                    <x-form-select name="akun_hutang_id" class="border-0 border-bottom">
                                        <option value="">Pilih Akun</option>
                                        @foreach($accounts as $account)
                                            <option value="{{ $account->id }}">{{ $account->name }}</option>
                                        @endforeach
                                    </x-form-select>
                                </td>
                            </tr>
                            <tr>
                                <th class="align-middle">Akun Piutang</th>
                                <td class="align-middle">:</td>
                                <td class="align-middle">
                                    <x-form-select name="akun_piutang_id" class="border-0 border-bottom">
                                        <option value="">Pilih Akun</option>
                                        @foreach($accounts as $account)
                                            <option value="{{ $account->id }}">{{ $account->name }}</option>
                                        @endforeach
                                    </x-form-select>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <button class="btn btn-primary width-md">
                    <i class="ti ti-save"></i>
                    Simpan
                </button>
            </form>
        </div>

    </div>
</div>
