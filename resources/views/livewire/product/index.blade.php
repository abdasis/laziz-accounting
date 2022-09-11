<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4 d-flex justify-content-between">
                <span>
                    <i class="icon icon-bag"></i>
                    Data Product
                </span>

                <a href="{{route('products.create')}}">
                    <button class="btn btn-light border-bottom">
                        <i class="fe-plus"></i>
                        <span>Produk Baru</span>
                    </button>
                </a>
            </h4>
            <livewire:product.table/>
        </div>
    </div>
</div>
