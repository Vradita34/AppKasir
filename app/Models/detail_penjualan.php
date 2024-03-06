<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_penjualan extends Model
{
    use HasFactory;

    protected $table = 'detail_penjualans';

    protected $fillable = [
        'kode_penjualan',
        'id_produk',
        'jumlah_produk',
        'subtotal',
    ];


    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }
}
