<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="mb-2">
        <button class="btn btn-primary border-bottom border-primary" data-bs-toggle="modal" data-bs-target="#modalCustomer">
            <i class="fas fa-plus-circle"></i>
            {{__('Customer Baru')}}
        </button>
    </div>
    <div class="card">
        <div class="card-header bg-white border-bottom border-light">
            <strong>
                Semua Customer
            </strong>
        </div>
        <div class="card-body">
            <livewire:pages.customers.table />
        </div>
    </div>

    <div class="modal fade" id="modalCustomer" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom border-light">
                    <h5 class="modal-title" id="modal-title">Tambah Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click.prevent="close()" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($update)
                        <livewire:pages.customers.edit :customer="$customer" />
                    @else
                        <livewire:pages.customers.create />
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@push('scripts')
    <script>
        Livewire.on('refresh', () => {
            $('#modalCustomer').modal('hide');
        });

        window.addEventListener('showModal', function(e) {
            $('#modal-title').text('Sunting Customer');
            $('#modalCustomer').modal('show');

        });
    </script>
@endpush
