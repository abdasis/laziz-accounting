<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div class="mb-2 ">
        <a href="{{route('products.create')}}">
            <button class="btn btn-primary">
                <i class="fe-plus"></i>
                <span>Produk Baru</span>
            </button>
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-3">
                <i class="icon icon-bag"></i>
                Data Product
            </h4>
            <livewire:pages.product.table/>
        </div>
    </div>
</div>
