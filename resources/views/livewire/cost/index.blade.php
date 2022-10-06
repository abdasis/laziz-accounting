<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="card border-top">
        <div class="card-body">
            <h4 class="card-title mb-3 d-flex justify-content-between">
                <span>
                    <i class="fe-activity"></i>
                    Pengeluaran
                </span>
                <a href="{{route('cost.create')}}">
                    <button class="btn btn-light border-bottom">
                        <i class="fe-plus"></i>
                        Biaya Baru
                    </button>
                </a>
            </h4>
            <livewire:cost.table/>
        </div>
    </div>
</div>
