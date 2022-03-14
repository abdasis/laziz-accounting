<div>
    {{-- The whole world belongs to you. --}}
    <div class="mb-2">
        <a href="{{route('purchases.create')}}">
            <button class="btn btn-primary border-bottom border-primary width-md rounded">
                <i class="icon icon-plus me-1"></i>
                Pembelian Baru
            </button>
        </a>
    </div>
    <div class="card">
        <div class="card-header bg-white bg-gradient border-bottom border-light">
            <strong>Data Semua Pembelian</strong>
        </div>
        <div class="card-body">
            <livewire:pages.purchase.table />
        </div>
    </div>
</div>
