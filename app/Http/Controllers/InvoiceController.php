<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class InvoiceController extends Controller
{
    public function print(Sales $sales)
    {
        $pdf = SnappyPdf::loadView('prints.invoice', [
            'sales' => $sales,
            'format' => \request()->get('format') ?? 'per-penjualan',
            'tanda_tangan' => \request()->get('tanda_tangan') ?? 'dengan-tanda-tangan',
        ])->setPaper('a4', 'portrait')
        ->setOptions([
            'margin-top'    => 0,
            'margin-right'  => 5,
            'margin-bottom' => 0,
            'margin-left'   => 5,
        ]);
        return $pdf->inline();
    }
}
