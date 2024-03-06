<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class temp extends Model
{
    use HasFactory;
    protected $table = 'temp';

    protected $fillable = [
        'id_produk',
        'jumlah',
        'id_pelanggan',
        'id_users',
    ];


    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }
}
