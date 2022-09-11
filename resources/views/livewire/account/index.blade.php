<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="card">
        <div class="card-header bg-white border-light d-flex justify-content-between">
            <h4>Semua Akun Biayaa</h4>
            <button class="btn btn-light border-bottom btn-sm" data-bs-target="#modalAccount" data-bs-toggle="modal">
                <i class="fe-plus"></i>
                Tambah Akun
            </button>
        </div>
        <div class="card-body">
            <livewire:account.table/>
        </div>
    </div>

    <x-modal target="modalAccount" title="Tambah Akun Baru">
        @if($update)
            <livewire:account.edit :account="$account"/>
        @else
            <livewire:account.create/>
        @endif
    </x-modal>
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
