<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="card border-light shadow-sm">
        <div class="card-body">
            <h4 class="card-title d-flex justify-content-between justify-content-center mb-3">
                <span>
                    Data Semua Penjualan
                </span>
                <a href="{{route('sales.create')}}">
                    <button class="btn btn-light rounded-3 fw-medium width-md border-bottom">
                        <i class="fe-plus me-1"></i>
                        Penjualan Baru
                    </button>
                </a>
            </h4>
            <livewire:sales.table/>
        </div>
    </div>
</div>
