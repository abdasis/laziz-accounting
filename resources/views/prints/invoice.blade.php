<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="{{public_path('assets/css/config/creative/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        .gambar-panjang-orange {
            background: #FFA500;
            height: 15px;
            width: 200px;
        }

        .gambar-panjang-coklat {
            margin-top: 6px;
            background: #6c2c01;
            height: 15px;
            width: 380px;
        }

        .gambar-panjang-hitam {
            margin-top: 6px;
            background: #000000;
            height: 15px;
            width: 550px;
        }

        html {
            position: relative;
            min-height: 1390px;
        }
        body {
            margin-bottom: 60px; /* Margin bottom by footer height */
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            line-height: 60px; /* Vertically center the text there */
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
<img src="{{public_path('assets/images/kop-surat.png')}}" class="img-fluid" alt="">
<h3 class="text-center mb-4">Invoice</h3>
<table class="table table-sm table-borderless border-white">
    <tr>
        <td>
            <table class="table table-borderless border-white">
                <tr>
                    <td>Kepada Yth</td>
                    <td>:</td>
                    <td class="text-wrap">
                        {{$sales->contact->company_name}}
                    </td>
                </tr>
            </table>
        </td >
        <td>
            <table class="table table-nowrap table-sm table-borderless border-white">
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
        </td>
    </tr>
</table>
<div class="detail-invoice">
    <table class="table table-sm table-striped" >
        <thead class="bg-soft-dark">
        <tr>
            <th>No</th>
            <th>Keterangan</th>
            <th class="text-center">Unit</th>
            <th class="text-center">Hari</th>
            <th class="text-end">Harga/Hari</th>
            <th class="text-end">Total</th>
        </tr>
        </thead>
        <tbody>
        @if($format == 'per-penjualan')
            <tr>
                <td class="text-center">1</td>
                <td>{{$sales->remarks}}</td>
                <td class="text-center">{{$sales->details()->first()->quantity}}</td>
                <td class="text-center">{{$sales->details()->first()->day}}</td>
                <td class="text-nowrap text-end">{{rupiah($sales->details()->sum('price'))}}</td>
                <td class="text-nowrap text-end">{{rupiah($sales->details()->sum('total'))}}</td>
            </tr>
        @else
            @foreach($sales->details as $detail)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$detail->description}}</td>
                    <td class="text-center">{{$detail->quantity}}</td>
                    <td class="text-center">{{$detail->day}}</td>
                    <td class="text-nowrap text-end">{{rupiah($detail->price)}}</td>
                    <td class="text-nowrap text-end">{{rupiah($detail->quantity * $detail->price  * $detail->day)}}</td>
                </tr>
            @endforeach
        @endif
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
<div class="footer-invoice d-flex">
    <table class="table border-white">
        <tr>
            <td>
                <p> Mohon untuk pembayaran ditransfer ke rekening :</p>
                <p class="my-0">Bank Mandiri </p>
                <p class="my-0">Kantor Cabang Banjarbaru</p>
                <table class="table table-sm border-white table-small-font mt-2 table-small-font table-borderless">
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
            </td>
            <td>
                <p class="text-center" >Hormat Kami</p>
                @if($tanda_tangan == 'dengan-tanda-tangan')
                    <img src="{{public_path('assets/images/tanda-tangan.png')}}" class="mx-auto d-block" style="height: 100px; width: auto; margin: 0 auto" alt="">
                @else
                    <img src="" alt="" style="margin-bottom: 150px">
                @endif
                <div class="text-center">
                    <h5 class="">MUTIA AMANA NASTITI</h5>
                    <div class="text-center my-0">
                        Direktur Utama
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>


<footer class="footer ">
    <div class="office">
        <h5>OFFICE</h5>
        <p>Jl. P. Suriansyah Gg. Sawi No. 99. Banjarbaru (0511) 4782897</p>
    </div>
    <div class="gambar-panjang-orange"></div>
    <div class="gambar-panjang-coklat"></div>
    <div class="gambar-panjang-hitam"></div>
</footer>
</body>
</html>
