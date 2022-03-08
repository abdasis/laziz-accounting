<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="mb-2">
        <button class="btn btn-primary" data-bs-target="#modalAccount" data-bs-toggle="modal">
            <i class="mdi mdi-plus-circle"></i>
            Tambah Akun
        </button>
    </div>
    <div class="card">
        <div class="card-header bg-white border-bottom border-light">
            <strong>Semua Akun Biayaa</strong>
        </div>
        <div class="card-body">
            <livewire:pages.account.table/>
        </div>
    </div>

    <x-molecules.modal target="modalAccount" title="Tambah Akun Baru">
        @if($update)
            <livewire:pages.account.edit :account="$account"/>
        @else
            <livewire:pages.account.create/>
        @endif
    </x-molecules.modal>
</div>

@push('scripts')
    <script>
        Livewire.on('refresh', () => {
            $('#modalAccount').modal('hide');
        });

        window.addEventListener('showModal', function(e) {
            $('.modal-title').text('Sunting Akun Biaya');
            $('#modalAccount').modal('show');

        });
    </script>
@endpush
