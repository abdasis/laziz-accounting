<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <form wire:submit.prevent="save">
        @wire
        <div class="mb-2">
            <x-form-input label="Nama Karyawan" name="name"/>
        </div>
        <div class="mb-2">
            <x-form-input label="NIK" name="ktp"/>
        </div>
        <div class="mb-2">
            <x-form-input label="Telepon" name="phone"/>
        </div>
        <div class="mb-2">
            <x-form-select name="gender" label="Jenis Kelamin">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="laki-laki">Laki-Laki</option>
                <option value="perempuan">Perempuan</option>
            </x-form-select>
        </div>
        <div class="mb-2">
            <x-form-select name="maritial_status" label="Status Pernikahan">
                <option value="">Status Pernikahan</option>
                <option value="belum menikah">Belum Menikah</option>
                <option value="sudah menikah">Sudah Menikah</option>
            </x-form-select>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-2">
                    <x-form-input label="Tempat Lahir" name="place_of_birth"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-2">
                    <x-form-input type="date" label="Tanggal Lahir" name="date_birthday"/>
                </div>
            </div>
        </div>
        <div class="mb-2">
            <x-form-textarea label="Alamat" name="address"/>
        </div>

        <div class="mb-2">
            <button class="btn btn-primary border-bottom border-primary rounded width-md mt-3">
                Simpan
            </button>
        </div>
        @endwire
    </form>
</div>

