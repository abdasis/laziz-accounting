<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="mb-2">
        <a href="{{route('customers.create')}}">
            <button class="btn btn-primary border-bottom border-primary">
                <i class="fas fa-plus-circle"></i>
                {{__('Customer Baru')}}
            </button>
        </a>
    </div>
    <div class="card">
        <div class="card-header bg-white border-bottom border-light">
            <strong>
                Semua Customer
            </strong>
        </div>
        <div class="card-body">
            <livewire:pages.customers.table />
        </div>
    </div>
</div>
