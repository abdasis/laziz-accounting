<div>
    {{-- The whole world belongs to you. --}}
    <div class="mb-2">
        <a href="{{route('purchases.create')}}">
            <button class="btn btn-primary border-bottom border-light width-md rounded">
                <i class="fe-plus"></i>
                <span>
                    Pembelian Baru
                </span>
            </button>
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title d-flex justify-content-between">
                <span class="align-middle">Data Semua Pembelian</span>
            </h4>
            <livewire:pages.purchase.table />
        </div>
    </div>
</div>
