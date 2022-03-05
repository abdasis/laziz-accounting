<div>
    {{-- Stop trying to control. --}}
    <div class="mb-2">
        <button class="btn btn-soft-blue" data-bs-toggle="modal" data-bs-target="#modalSupplier">
            <i class="fas fa-plus-circle"></i>
            Supplier Baru
        </button>
    </div>
    <div class="card">
        <div class="card-header bg-white border-bottom border-light">
            <strong>Data Semua Supplier</strong>
        </div>
        <div class="card-body">
            <livewire:pages.suppliers.table/>
        </div>
    </div>

    <div class="modal fade" id="modalSupplier" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom border-light">
                    <h5 class="modal-title" id="modal-title">Tambah Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click.prevent="close()" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($update)
                        <livewire:pages.suppliers.edit :supplier="$supplier" />
                    @else
                        <livewire:pages.suppliers.create />
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('refresh', function () {
            $('#modalSupplier').modal('hide');
        });

        window.addEventListener('showModal', function(e) {
            $('#modal-title').text('Sunting Supplier');
            $('#modalSupplier').modal('show');

        });
    </script>
@endpush
