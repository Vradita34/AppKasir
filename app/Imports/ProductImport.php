<?php

namespace App\Imports;

use App\Models\produk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new produk([
            'nama_produk' => $row['name'],
            'harga' => $row['harga'],
            'stok' => $row['stok'],
            'kode_produk' => $row['kode'],
        ]);
        // dd($row);
    }
}
