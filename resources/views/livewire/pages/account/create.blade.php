<div>
    {{-- The whole world belongs to you. --}}
    <form wire:submit.prevent="store">

        <div class="mb-2">
            <x-form-input name="name" type="text" placeholder="Nama Akun" label="Nama Akun" />
        </div>
        <div class="mb-2">
            <x-form-input name="code" type="text" placeholder="Masukan Kode" label="Kode Akun"/>
        </div>
        <div class="mb-2">
            <x-form-select name="account_category_id" label="Kategori">
                <option value="">Pilih Kategori</option>
                @foreach($account_categories as $account_category)
                    <option value="{{ $account_category->id }}">{{ $account_category->name }}</option>
                @endforeach
            </x-form-select>
            <small class="text-muted">Kode akan dibuat otomatis setelah memilih kategori</small>

        </div>
        @if($accounts->isNotEmpty())
            <div class="mb-2">
                <x-form-select name="parent_id" label="Sub Akun Dari">
                    <option value="">Pilih Akun</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                    @endforeach
                </x-form-select>

            </div>
        @endif
        <div class="mb-2">
            <x-form-textarea name="description" type="text" placeholder="Deskripsi" label="Diskripsi"/>
        </div>

       <div class="row">
           <div class="col-md-6">
               <div class="mb-2">
                   <x-form-select name="account_type" label="Jenis Akun">
                       <option value="">Pilih Jenis Akun</option>
                       <option value="neraca">Neraca</option>
                       <option value="laba rugi">Laba rugi</option>
                   </x-form-select>

               </div>
           </div>
           <div class="col-md-6">
               <div class="mb-2">
                   <x-form-select name="default_balance" label="Default Saldo">
                       <option value="">Pilih Jenis Saldo</option>
                       <option value="kredit">Kredit</option>
                       <option value="debit">Debit</option>
                   </x-form-select>

               </div>
           </div>
       </div>
        <div class="mb-2 mt-2 d-flex justify-content-between">
            <div class="btn-left">
                <button wire:click.prevent="updateLock" type="button" class="btn btn-light">
                    @if($lock_status == 'locked')
                        <i class="mdi mdi-lock text-danger" ></i>
                    @else
                        <i class="mdi mdi-lock-open" ></i>
                    @endif
                </button>
            </div>
            <button class="btn btn-primary">
                <i class="fas fa-save"></i>
                Simpan
            </button>
        </div>
    </form>
</div>
