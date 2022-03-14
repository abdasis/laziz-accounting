<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="mb-2">
        <button class="btn btn-primary rounded-3 border-bottom border-primary" data-bs-target="#modalEmployee" data-bs-toggle="modal">
            <i class="icon icon-plus"></i>
            Karyawan Baru
        </button>
    </div>

    <div class="card">
        <div class="card-header bg-white border-bottom border-light">
            <strong>Data Semua Karyawan</strong>
        </div>
        <div class="card-body">
            <livewire:pages.employee.table/>
        </div>
    </div>

    <x-molecules.modal target="modalEmployee" title="Tambah Karyawan" >
        @if($update)
            <livewire:pages.employee.edit :employee="$employee"/>
        @else
            <livewire:pages.employee.create/>
        @endif
    </x-molecules.modal>
</div>


@push('scripts')
    <script>
        Livewire.on('refresh', () => {
            $('#modalEmployee').modal('hide');
        });


        window.addEventListener('showModal', function (e) {
            $('#modalEmployee').modal('show');
            $('.modal-title').text('Edit Karyawan');
        });
    </script>
@endpush
