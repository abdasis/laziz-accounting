<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="mb-2">
        <a href="{{route('sales.create')}}">
            <button class="btn btn-secondary rounded-3">
                <i class="fas fa-plus-circle"></i>
                Penjualan Baru
            </button>
        </a>
    </div>
    <div class="card border-top">
        <div class="card-body">
            <h4 class="card-title">
                Data Semua Penjualan
            </h4>

            <livewire:pages.sales.table/>
        </div>
    </div>
</div>
