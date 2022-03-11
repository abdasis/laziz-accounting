<div>
    {{-- Success is as dangerous as failure. --}}
    <ul class="nav nav-tabs nav-bordered">
        <li class="nav-item">
            <a href="#perusahaan" class="nav-link {{$step != 1 ? '' : 'active'}}">
                <i class="mdi mdi-bank"></i>
                Company Info
            </a>
        </li>
        <li class="nav-item">
            <a href="#contact-perusahaan"  class="nav-link {{$step != 2 ? '' : 'active'}}">
                <i class="mdi mdi-phone"></i>
                Contact Info
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane {{$step != 1 ? '' : 'active'}}" id="home-b1">
            <div class="mb-2">
                <x-form-input name="company_name" label="Nama Supplier"
                              placeholder="Masukan nama perusahaan"/>
            </div>
            <div class="mb-2">
                <x-form-select label="Jenis Industri" name="industry_type">
                    <option value="">Pilih Jenis Industry</option>
                    <option value="Software Developer">Software Developer</option>

                </x-form-select>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-2">
                        <x-form-input name="province" label="Provinsi" placeholder="Masukan provinsi"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <x-form-input name="city" label="Kota" placeholder="Masukan kota"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <x-form-input name="districts" label="Kecamatan" placeholder="Masukan kecamatan"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <x-form-input name="postal_code" label="Kode Pos" placeholder="Masukan kode pos"/>
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <x-form-textarea name="address" label="Alamat" placeholder="Masukan alamat"/>
            </div>
            <div class="mt-3 d-flex justify-content-between">
                <button class="btn btn-danger" wire:click="back(1)">Kembali</button>
                <button type="submit" wire:click.prevent="companyInfo" class="btn btn-primary">
                    Lanjut
                </button>
            </div>
        </div>
        <div class="tab-pane {{$step != 2 ? '' : 'active'}}" id="profile-b1">
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
            <div class="mt-3 d-flex justify-content-between">
                <button class="btn btn-danger" wire:click="back(1)">Kembali</button>
                <button type="submit" wire:click.prevent="contactInfo" class="btn btn-primary">
                    Simpan
                </button>
            </div>
        </div>


    </div>
</div>