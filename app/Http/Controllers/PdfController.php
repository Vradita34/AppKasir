<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\penjualan;
use Illuminate\Http\Request;
use App\Models\detail_penjualan;

class PdfController extends Controller
{

    public function invoice($nota)
    {
        $penjualans = Penjualan::join('pelanggans', 'penjualans.pelanggan_id', '=', 'pelanggans.id')
            ->select('penjualans.*', 'pelanggans.*')
            ->where('kode_penjualan', $nota)
            ->orderBy('penjualans.created_at', 'desc')
            ->first();

        $detailPenjualan = detail_penjualan::join('produks', 'detail_penjualans.id_produk', '=', 'produks.id')
            ->where('detail_penjualans.kode_penjualan', $nota)
            ->get(['detail_penjualans.*', 'produks.nama_produk', 'produks.harga']);

        $data = [
            'penjualan' => $penjualans,
            'detailPenjualan' => $detailPenjualan,
            'nota' => $nota,
            'title' => 'Donwload Invoice PDF'
        ];

        $pdf = Pdf::loadView('pdf.invoice', $data);
        return $pdf->download('invoice.pdf');
    }
}
