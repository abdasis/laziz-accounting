<div>
    <div class="card shadow-sm border-light rounded-3">
        <div class="card-body">
            <div class="card-title justify-content-between d-flex">
                <h4>Data Semua Kontak</h4>
                <a href="{{route('contacts.create')}}">
                    <button class="btn btn-light border-bottom rounded">
                        <i class="fe-plus me-1"></i>
                        Contact Baru
                    </button>
                </a>
            </div>
            <ul class="nav nav-tabs nav-bordered">
                <li class="nav-item">
                    <a wire:click.prevent="updateType('customer')" href="#customer"  class="nav-link {{$type_contact != 'customer' ? '' : 'active'}}">
                        Customer
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:click.prevent="updateType('supplier')" href="#supplier" class="nav-link {{$type_contact != 'supplier' ? '' : 'active'}}">
                        Supplier
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:click.prevent="updateType('karyawan')" href="#karyawan" class="nav-link {{$type_contact != 'karyawan' ? '' : 'active'}}">
                        Karyawan
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:click.prevent="updateType('lainnya')" href="#lainnya" class="nav-link {{$type_contact != 'lainnya' ? '' : 'active'}}">
                        Lainnya
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane {{$type_contact != 'customer' ? '' : 'active'}}" id="customer">
                    <livewire:contact.table/>
                </div>
                <div class="tab-pane {{$type_contact != 'supplier' ? '' : 'active'}}" id="supplier">
                    <livewire:contact.table/>
                </div>
                <div class="tab-pane {{$type_contact != 'karyawan' ? '' : 'active'}}"  id="karyawan">
                    <livewire:contact.table/>
                </div>
                <div class="tab-pane {{$type_contact != 'lainnya' ? '' : 'active'}}"  id="lainnya">
                    <livewire:contact.table/>
                </div>
            </div>
        </div>
    </div>
</div>
