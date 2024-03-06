<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\produk;
use App\Models\pelanggan;
use App\Models\penjualan;
use Illuminate\Http\Request;
use App\Models\detail_penjualan;
use App\Models\temp;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Crypt;


class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualans = Penjualan::join('pelanggans', 'penjualans.pelanggan_id', '=', 'pelanggans.id')
            ->select('penjualans.*', 'pelanggans.nama')
            ->whereMonth('penjualans.created_at', '=', Carbon::now()->month())
            ->orderBy('penjualans.created_at', 'desc')
            ->get();
        $pelanggans = Pelanggan::all();
        $user = User::all();

        return view('pages.penjualan', [
            'title' => 'Penjualan',
            'pelanggan' => $pelanggans,
            'penjualan' => $penjualans,
            'user' => $user,
        ]);
    }

    public function transaksi($id)
    {
        $decodedId = Crypt::decrypt($id);
        $namaPelanggan = Pelanggan::find($decodedId);
        $nota = penjualan::getTransaksiData($decodedId);

        $detailPenjualan = detail_penjualan::join('produks', 'detail_penjualans.id_produk', '=', 'produks.id')
            ->where('detail_penjualans.kode_penjualan', $nota['nota'])
            ->get(['detail_penjualans.*', 'produks.nama_produk', 'produks.harga']);
        $temp = temp::join('produks', 'temp.id_produk', '=', 'produks.id')
            ->where('temp.id_users', auth()->user()->id)
            ->get(['temp.*', 'produks.nama_produk', 'produks.harga', 'produks.kode_produk', 'produks.stok']);

        $produk = Produk::where('stok', '>', 0)->get();
        // dd($temp);
        return view('pages.penjualan_transaksi', [
            'title' => 'Penjualan',
            'nota' => $nota,
            'produk' => $produk,
            'namaPelanggan' => $namaPelanggan,
            'id_pelanggan' => $decodedId,
            'detailPenjualan' => $detailPenjualan,
            'temp' => $temp,
        ]);
    }

    public function bayar(Request $request)
    {
        $validateData = $request->validate([
            'pelanggan_id' => 'required',
            'kode_penjualan' => 'required',
            'total_harga' => 'required|numeric',
        ]);
        $temp = temp::join('produks', 'temp.id_produk', '=', 'produks.id')
            ->where('temp.id_users', auth()->user()->id)
            ->select('temp.*', 'produks.nama_produk', 'produks.harga', 'produks.kode_produk', 'produks.stok', 'produks.id as id_produk')
            ->get();
        foreach ($temp as $ajg) {
            if ($ajg->stok < $ajg->jumlah) {
                return redirect()->to(URL::previous())->with('error', 'Stok produk tidak mencukupi');
            }

            // input ke table detail penjualan
            detail_penjualan::create([
                'kode_penjualan' => $validateData['kode_penjualan'],
                'id_produk' => $ajg->id_produk,
                'jumlah_produk' => $ajg->jumlah,
                'subtotal' => $ajg->jumlah * $ajg->harga,
            ]);
            $produk = Produk::find($ajg->id_produk);
            $stokSekarang = $produk->stok - $ajg->jumlah;
            $produk->update(['stok' => $stokSekarang]);
        }
        // hapus data dari tabel temp
        Temp::where([
            'id_users' => auth()->user()->id,
            'id_pelanggan' => $validateData['pelanggan_id']
        ])->delete();
        // input ke table penjualan
        $penjualan = penjualan::create($validateData);
        return redirect()->route('penjualan.invoice', ['nota' => $request['kode_penjualan']]);
    }


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

        return view('pages.invoice', [
            'title' => 'Penjualan',
            'nota' => $nota,
            'penjualan' => $penjualans,
            'detailPenjualan' => $detailPenjualan
        ]);
    }
}
