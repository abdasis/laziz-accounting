<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="card border-top">
        <div class="card-header bg-white  d-flex justify-content-between">
            <h4>Data Semua Aset</h4>
            <a href="{{route('aset.create')}}">
                <button class="btn btn-light border-bottom rounded">
                    <i class="fe-plus me-1"></i>
                    Aset Baru
                </button>
            </a>
        </div>
        <div class="card-body">
            <livewire:pages.aset.table/>
        </div>
    </div>
</div>
