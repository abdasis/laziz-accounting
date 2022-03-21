<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="card border-top">
        <div class="row">
            <div class="col-md-4 border-end border-light">
                <div class="card-body">
                    <h4 class="card-title mb-4">Detail <span class="text-primary">{{$contact->company_name}}</span></h4>
                    <img src="{{Avatar::create($contact->company_name)}}" alt="" class="avatar-lg mb-2 d-grid mx-auto img-thumbnail rounded-circle">
                    <h5 class="text-center my-0 py-0">{{$contact->company_name}}</h5>
                    <p class="text-center py-0">id.abdasis@gmail.com</p>
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td>Perusahaan</td>
                            <td>:</td>
                            <td>{{$contact->company_name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{$contact->email}}</td>
                        </tr>
                        <tr>
                            <td>Contact Person</td>
                            <td>:</td>
                            <td>{{$contact->contact_name}}</td>
                        </tr>
                        <tr>
                            <td>NPWP</td>
                            <td>:</td>
                            <td>{{$contact->npwp}}</td>
                        </tr>
                        <tr>
                            <td>Jenis Contact</td>
                            <td>:</td>
                            <td>
                                <div class="badge badge-rounded badge-outline-primary">
                                    {{Str::title($contact->type_contact)}}
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-bordered">
                        <li class="nav-item">
                            <a wire:click.prevent="updateType('karyawan')" href="#karyawan" class="nav-link">
                                Tentang
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:click.prevent="updateType('customer')" href="#customer"  class="nav-link">
                                Transaksi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:click.prevent="updateType('supplier')" href="#supplier" class="nav-link">
                                Invoice
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:click.prevent="updateType('karyawan')" href="#karyawan" class="nav-link">
                                Karyawan
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="customer">
                            <table class="table table-sm table-hover table-borderless">
                                <tr>
                                    <th colspan="3">
                                        <h5 class="text-primary">
                                            <i class="icon icon-rocket"></i>
                                            Tentang
                                        </h5>
                                    </th>
                                </tr>
                                <tr>
                                    <td>Nama Perusahaan</td>
                                    <td>:</td>
                                    <td>{{$contact->company_name}}</td>
                                </tr>
                                <tr>
                                    <td>Telepon</td>
                                    <td>:</td>
                                    <td>{{$contact->handphone}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{$contact->email}}</td>
                                </tr>
                                <tr>
                                    <td>Fax</td>
                                    <td>:</td>
                                    <td>{{$contact->fax}}</td>
                                </tr>
                                <tr class="">
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{{$contact->shipping_address}}</td>
                                </tr>
                                <tr>
                                   <th colspan="3">
                                       <h5 class="text-primary">
                                           <i class="icon icon-handbag"></i>
                                           Bank
                                       </h5>
                                   </th>
                                </tr>
                                <tr>
                                    <td>Nama Bank</td>
                                    <td>:</td>
                                    <td>{{Str::upper($contact->bank_name)}}</td></td>
                                </tr>
                                <tr>
                                    <td>Nomor Rekening</td>
                                    <td>:</td>
                                    <td>{{$contact->bank_account_number}}</td>
                                </tr>
                                <tr>
                                    <td>Cabang</td>
                                    <td>:</td>
                                    <td>{{Str::title($contact->branch_office)}}</td>
                                </tr>
                            </table>

                        </div>
                        <div class="tab-pane" id="supplier">
                            <livewire:pages.contact.table/>
                        </div>
                        <div class="tab-pane"  id="karyawan">
                            <livewire:pages.contact.table/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <button wire:click.prevent="delete({{$contact->id}})" class="btn btn-action text-danger">
            <i class="mdi mdi-trash-can"></i>
            <span>Hapus</span>
        </button>
        <a href="{{route('contacts.edit', $contact->id)}}">
            <i class="ti ti-pencil"></i>
            <span>Sunting</span>
        </a>
    </div>
</div>
