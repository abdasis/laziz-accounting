<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="card border-light shadow-sm">
        <div class="card-header bg-white border-bottom border-light d-flex align-items-center justify-content-between">
            <h5>
                Data Semua Penjualan
            </h5>
            <a href="{{route('sales.create')}}">
                <button class="btn btn-light rounded-3 waves-effect fw-medium shadow-none border-bottom">
                    <i class="fe-plus me-1"></i>
                    Penjualan Baru
                </button>
            </a>
        </div>
        <div class="card-body bg-soft-light">
            <livewire:sales.table/>
        </div>
    </div>
</div>
