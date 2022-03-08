<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <form wire:submit.prevent="store">
        <div class="mb-2">
            <x-form-input type="text" name="code" label="Kode Kategori" />
        </div>
        <div class="mb-2">
            <x-form-input type="text" name="name" label="Nama Kategori" />
        </div>
        <div class="mb-2">
            <x-form-textarea name="notes" label="Deskripsi" />
        </div>
        <div class="mb-2 float-end">
            <button class="btn btn-primary">
                <i class="fas fa-save"></i>
                Simpan
            </button>
        </div>
    </form>
</div>
