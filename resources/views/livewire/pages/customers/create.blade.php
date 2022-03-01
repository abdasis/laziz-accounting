<div>
    {{-- Do your work, then step back. --}}
    <div class="card">
        <div class="card-header bg-white border-bottom border-light">
            <strong>Tambah Customer</strong>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <form wire:submit.prevent="store">
                        @wire('lazy')
                        <div class="mb-2">
                            <x-form-input name="company_name" label="Nama Customer"
                                          placeholder="Masukan nama perusahaan"/>
                        </div>
                        <div class="mb-2">
                            <x-form-input name="contact_name" label="Contact Person"
                                          placeholder="Masukan nama contact person"/>
                        </div>
                        <div class="mb-2">
                            <x-form-input name="email" label="Email" placeholder="Masukan email"/>
                        </div>
                        <div class="mb-2">
                            <x-form-input name="phone" label="No. Telepon" placeholder="Masukan nomor telepon"/>
                        </div>
                        <div class="mb-2">
                            <x-form-input name="province" label="Provinsi" placeholder="Masukan provinsi"/>
                        </div>
                        <div class="mb-2">
                            <x-form-input name="city" label="Kota" placeholder="Masukan kota"/>
                        </div>
                        <div class="mb-2">
                            <x-form-input name="districts" label="Kecamatan" placeholder="Masukan kecamatan"/>
                        </div>
                        <div class="mb-2">
                            <x-form-input name="postal_code" label="Kode Pos" placeholder="Masukan kode pos"/>
                        </div>
                        <div class="mb-2">
                            <x-form-textarea name="address" label="Alamat" placeholder="Masukan alamat"/>
                        </div>
                        <div class="mb-2">
                            <button class="btn btn-primary width-lg">
                                <span>
                                     <i wire:loading.remove class='fas fa-save'></i>
                                </span>
                                <span wire:loading.delay.longest class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <span>Simpan</span>
                            </button>
                        </div>
                        @endwire

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
