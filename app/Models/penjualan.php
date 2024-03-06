<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class penjualan extends Model
{
    use HasFactory;

    protected $fillable = ['created_at', 'total_harga', 'pelanggan_id', 'kode_penjualan'];

    public static function getTodaySales()
    {
        // return self::whereDate('created_at', now()->toDateString())
        //     ->orderBy('created_at', 'desc')
        //     ->get();
        return self::whereDate('created_at', today())->orderByDesc('created_at')->get();
    }

    public static function getTransaksiData($decodedId)
    {
        $today = now();
        $loggedInUserId = Auth::id();
        $transaksiData = [
            'tahun' => $today->year,
            'bulan' => $today->month,
            'tanggal' => $today->day,
        ];
        // dd($loggedInUserId);

        $jumlahData = self::whereYear('created_at', $today->year)
            ->whereMonth('created_at', $today->month)
            ->count() + 1;

        $transaksiData['nota'] = $today->year . $today->month . $today->day . $decodedId . $loggedInUserId . $jumlahData;

        return $transaksiData;
    }
}
