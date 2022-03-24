<div>
    {{-- The whole world belongs to you. --}}

    <div class="card">
        <div class="card-body">
            <h4 class="card-title d-flex justify-content-between mb-3">
                <span class="align-middle">Data Semua Pembelian</span>
                <a href="{{route('purchases.create')}}">
                    <button class="btn btn-light border-bottom width-md rounded">
                        <i class="fe-plus"></i>
                        <span>
                    Pembelian Baru
                </span>
                    </button>
                </a>
            </h4>

            <livewire:pages.purchase.table />
        </div>
    </div>
</div>
