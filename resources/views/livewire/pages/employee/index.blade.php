<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="mb-2">
        <button class="btn btn-primary border-bottom border-primary" data-bs-target="#modalEmployee" data-bs-toggle="modal">
            <i class="fas fa-plus-circle"></i>
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
            <livewire:pages.employee.edit/>
        @else
            <livewire:pages.employee.create/>
        @endif
    </x-molecules.modal>
</div>
