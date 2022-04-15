<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="card border-top">
        <div class="card-header bg-white d-flex justify-content-between">
            <h4>Semua Staff</h4>
            <a href="{{route('staff.create')}}">
                <button class="btn btn-light border-bottom">
                    <i class="fe-plus me-1"></i>
                    Staff Baru
                </button>
            </a>
        </div>
        <div class="card-body">
            <livewire:pages.staff.table/>
        </div>
    </div>
</div>
