<div>
    {{-- The whole world belongs to you. --}}
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white border-light border-bottom">
                    <strong>Rincian Customer</strong>
                </div>
                <div class="card-body">
                    <img src="{{\Avatar::create($customer->company_name)->setDimension(120)->setFontSize(40)->setShape('square')}}" class=" d-grid mx-auto img-thumbnail rounded-circle" alt="">
                    <h4 class="card-title mt-2 pb-0 mb-0 text-center">{{$customer->company_name}}</h4>
                    <p class="text-muted text-center">{{$customer->email}} - {{$customer->phone}}</p>
                    <div class="text-center">
                        <div class="d-inline-block align-middle">
                            <span class="badge px-2 py-1 fw-bold badge-soft-{{$customer->status == 'active' ? 'success' : 'danger'}}">{{$customer->status}}</span>
                            <button class="btn btn-link" wire:click="updateStatus">
                                <i  class="mdi mdi-account-switch my-auto text-blue" style="cursor: pointer"></i>
                            </button>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td>Nama Perusahaan</td>
                            <td>:</td>
                            <td>{{$customer->company_name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{$customer->email}}</td>
                        </tr>
                        <tr>
                            <td>No. Telp</td>
                            <td>:</td>
                            <td>{{$customer->phone}}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{$customer->address}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
