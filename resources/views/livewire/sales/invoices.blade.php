<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm border-light">
                <div class="card-body">
                    <form action="{{route('sales.print-invoice',['sales' => $sales, 'format' => $format, 'tanda_tangan' => $tanda_tangan])}}" method="GET">
                        @csrf
                        <div class="form-group mb-2">
                            <x-form-select name="format" wire:model="format" label="Format">
                                <option value="">Pilih Format</option>
                                <option value="per-penjualan">Per Pernjualan</option>
                                <option value="per-item">Per Item Penjualan</option>
                            </x-form-select>
                        </div>
                        <div class="form-group mb-2">
                            <x-form-select label="Tanda Tangan" name="tanda_tangan" wire:model="tanda_tangan">
                                <option value="">Pilih Tampilan</option>
                                <option value="dengan-tanda-tangan">Dengan Tanda Tangan</option>
                                <option value="tanpa-tanda-tangan">Tanpa Tanda Tangan</option>
                            </x-form-select>
                        </div>
                        <div class="form-group mb-2">
                            <button class="btn btn-warning">
                                <i class="mdi mdi-file-pdf"></i>
                                Print Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm border-light">
                <img src="{{asset('themes/images/kop-surat.png')}}" class="img-fluid" alt="">
                <div class="card-body">

                    <h3 class="text-center mb-4">Invoice</h3>

                    <div class="customer d-flex justify-content-between gap-2">
                        <div class="customer-detail">
                            <h5 class="mb-2 fw-light">Kepada Yth:</h5>
                            <h4 class="my-0">{{$sales->contact->company_name}}</h4>
                            <p>{{$sales->contact->shipping_address}}</p>
                        </div>
                        <div class="customer-invoice">
                            <table class="table table-nowrap table-sm table-borderless">
                                <tr>
                                    <td>No. Invoice</td>
                                    <td>:</td>
                                    <td> {{$sales->id}}
                                        /INV/SOKA-R/{{getRoman(\Carbon\Carbon::parse($sales->transaction_date)->format('m'))}}
                                        /{{\Carbon\Carbon::parse($sales->transaction_date)->format('Y')}}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>:</td>
                                    <td>{{\Carbon\Carbon::parse($sales->transaction_date)->format('d F Y')}}</td>
                                </tr>
                                <tr>
                                    <td>Jatuh Tempo</td>
                                    <td>:</td>
                                    <td>{{\Carbon\Carbon::parse($sales->due_date)->format('d F Y')}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="detail-invoice">
                        <table class="table table-sm table-striped">
                            <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Keterangan</th>
                                <th>Unit</th>
                                <th>Hari</th>
                                <th class="text-end">Harga/Hari</th>
                                <th class="text-end">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sales->details as $detail)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$detail->description}}</td>
                                    <td>{{$detail->quantity}}</td>
                                    <td>{{$detail->day}}</td>
                                    <td class="text-nowrap text-end">{{rupiah($detail->price)}}</td>
                                    <td class="text-nowrap text-end">{{rupiah($detail->quantity * $detail->price  * $detail->day)}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"></td>
                                <td class="text-end">Total</td>
                                <td class="text-end">{{rupiah($sales->details->sum('total'))}}</td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td class="text-end">PPn 11%</td>
                                <td class="text-end">{{ rupiah($sales->total_ppn)}}</td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td class="text-end">Grand Total</td>
                                <td class="text-end">{{rupiah($sales->total_ppn + $sales->details->sum('total'))}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="footer-invoice" style="display: flex">
                        <div class="informasi-tambahan" style="width: 50%">
                            <p> Mohon untuk pembayaran ditransfer ke rekening :</p>
                            <p class="my-0">Bank Mandiri </p>
                            <p class="my-0">Kantor Cabang Banjarbaru</p>
                            <table class="table table-sm table-small-font mt-2 table-small-font table-borderless">
                                <tr>
                                    <td>No. Rekening</td>
                                    <td>:</td>
                                    <td>0310010326935</td>
                                </tr>
                                <tr>
                                    <td>Atas Nama</td>
                                    <td>:</td>
                                    <td> PT. Soka Wisata</td>
                                </tr>
                            </table>
                        </div>
                        <div class="tanda-tangan" style="width: 50%">
                            <p class="text-center mb-5 ">Hormat Kami</p>
                            <div class="text-center">
                                <h5 class="mt-5">MUTIA AMANA NASTITI</h5>
                                <div class="text-center my-0">
                                    Direktur Utama
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="office">
                        <h5>OFFICE</h5>
                        <p>Jl. P. Suriansyah Gg. Sawi No. 99. Banjarbaru (0511) 4782897</p>
                    </div>
                    <div class="gambar-panjang-orange"></div>
                    <div class="gambar-panjang-coklat"></div>
                    <div class="gambar-panjang-hitam"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('css')
    <style>
        .gambar-panjang-orange {
            background: #FFA500;
            height: 10px;
            width: 100px;
        }

        .gambar-panjang-coklat {
            margin-top: 6px;
            background: #6c2c01;
            height: 10px;
            width: 180px;
        }

        .gambar-panjang-hitam {
            margin-top: 6px;
            background: #000000;
            height: 10px;
            width: 250px;
        }

    </style>

@endpush
