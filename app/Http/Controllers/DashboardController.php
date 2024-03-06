<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\penjualan;
use App\Models\produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPenjualanHariIni = Penjualan::whereDate('created_at', Carbon::today())->sum('total_harga');
        $totalPenjualanBulanIni = Penjualan::whereMonth('created_at', Carbon::now()->month)->sum('total_harga');
        $totalTransaksiHariIni = Penjualan::whereDate('created_at', Carbon::today())->count();
        $totalTransaksiBulanIni = Penjualan::whereMonth('created_at', Carbon::now()->month)->count();
        $totalUsers = User::count();
        $totalProducts = Produk::count();
        $penjualans = Penjualan::join('pelanggans', 'penjualans.pelanggan_id', '=', 'pelanggans.id')
            ->select('penjualans.*', 'pelanggans.nama')
            ->whereDate('penjualans.created_at', now()->toDateString())
            ->orderBy('penjualans.created_at', 'desc')
            ->get();

        $fiveMonthsAgo = Carbon::now()->subMonths(5);

        // Mendapatkan data penjualan
        $penjualans2 = Penjualan::join('pelanggans', 'penjualans.pelanggan_id', '=', 'pelanggans.id')
            ->select('penjualans.*', 'pelanggans.nama')
            ->where('penjualans.created_at', '>=', $fiveMonthsAgo)
            ->orderBy('penjualans.created_at', 'asc')
            ->get();

        // Format data penjualan untuk chart
        $chartData = [
            'categories' => [],
            'jumlah' => [],
        ];

        // Loop untuk setiap bulan dalam rentang waktu
        for ($i = 0; $i < 5; $i++) {
            $month = $fiveMonthsAgo->copy()->addMonths($i);
            $chartData['categories'][] = $month->format('M Y');

            // Jika data penjualan untuk bulan tersebut ada, tambahkan total harga
            $penjualanForMonth = $penjualans2->where('created_at', '>=', $month)->where('created_at', '<', $month->copy()->addMonth());
            $chartData['jumlah'][] = $penjualanForMonth->count();
        }
        // dd($chartData);

        return view('pages.dashboard', [
            'title' => 'Dashboard',
            'totalPenjualanHariIni' => $totalPenjualanHariIni,
            'totalPenjualanBulanIni' => $totalPenjualanBulanIni,
            'totalTransaksiHariIni' => $totalTransaksiHariIni,
            'totalTransaksiBulanIni' => $totalTransaksiBulanIni,
            'totalUsers' => $totalUsers,
            'totalProducts' => $totalProducts,
            'penjualan' => $penjualans,
            'chartData' => $chartData,
        ]);
    }
}
