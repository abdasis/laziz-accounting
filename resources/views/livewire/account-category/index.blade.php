<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="mb-2">
        <button class="btn btn-primary" data-bs-target="#modalCategory" data-bs-toggle="modal">
            <i class="fas fa-plus-circle"></i>
            Tambah Kategori
        </button>
    </div>
    <div class="card">
        <div class="card-header bg-white border-bottom border-light">
            <strong>Semua Kategori Akun</strong>
        </div>
        <div class="card-body">
            <livewire:pages.account-category.table/>
        </div>
    </div>

    <x-molecules.modal target="modalCategory" title="Tambah Akun Kategori">
        @if($update)
            <livewire:pages.account-category.edit :category="$accountCategory"/>
        @else
            <livewire:pages.account-category.create/>
        @endif
    </x-molecules.modal>

</div>


@push('scripts')
    <script>
        window.addEventListener('showModal', function(e) {
            $('#modal-title').text('Sunting Account Category');
            $('#modalCategory').modal('show');
        });


    </script>
@endpush
