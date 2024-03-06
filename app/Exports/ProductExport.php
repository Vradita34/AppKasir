<?php

namespace App\Exports;

use App\Models\Produk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductExport implements FromView
{
    public function view(): View
    {
        $produks = Produk::all();

        return view('partials.table_product', [
            'produks' => $produks,
        ]);
    }
}
