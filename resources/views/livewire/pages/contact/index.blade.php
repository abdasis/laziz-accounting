<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="mb-2">
        <a href="{{route('contacts.create')}}">
            <button class="btn btn-primary rounded-3">
                <i class="icon icon-plus me-1"></i>
                Tambah Kontak
            </button>
        </a>
    </div>
    <div class="card border-top border-2 shadow-none">
        <div class="card-body">
            <div class="card-title">
                <h4>Data Semua Kontak</h4>
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
                    <livewire:pages.contact.table/>
                </div>
                <div class="tab-pane {{$type_contact != 'supplier' ? '' : 'active'}}" id="supplier">
                    <livewire:pages.contact.table/>
                </div>
                <div class="tab-pane {{$type_contact != 'karyawan' ? '' : 'active'}}"  id="karyawan">
                    <livewire:pages.contact.table/>
                </div>
                <div class="tab-pane {{$type_contact != 'lainnya' ? '' : 'active'}}"  id="lainnya">
                    <livewire:pages.contact.table/>
                </div>
            </div>
        </div>
    </div>
</div>