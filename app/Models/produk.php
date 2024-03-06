<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $fillable = [
        'id',
        'nama_produk',
        'harga',
        'stok',
        'kode_produk',
    ];


    protected static function boot()
    {
        parent::boot();

        // Creating event to generate 'kode_produk' before saving the record
        static::creating(function ($produk) {
            $produk->generateKodeProduk();
        });
    }


    // Method to generate 'kode_produk'
    public function generateKodeProduk()
    {
        // Remove spaces from nama_produk
        $namaProdukWithoutSpaces = str_replace(' ', '', $this->nama_produk);

        // Get the first three characters of nama_produk
        $front = substr($namaProdukWithoutSpaces, 0, 3);

        // Get the last three characters of nama_produk
        $back = substr($namaProdukWithoutSpaces, -3);

        // Get the current date and time in the specified format (YmdHis)
        $datetime = now()->format('YmdHis');

        // Combine the components to create 'kode_produk'
        $this->kode_produk = strtoupper($front . $back . $datetime);
    }
}
