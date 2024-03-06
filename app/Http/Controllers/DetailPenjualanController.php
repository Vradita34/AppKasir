<?php

namespace App\Http\Controllers;

use App\Models\penjualan;
use App\Models\produk;
use Illuminate\Http\Request;
use App\Models\detail_penjualan;
use Illuminate\Support\Facades\URL;


class DetailPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tambahKeranjang(Request $request)
    {
        $validateData = $request->validate([
            'id_produk' => 'required',
            'kode_penjualan' => 'required',
            'jumlah_produk' => 'required|numeric',
        ]);

        $produk = Produk::find($validateData['id_produk']);

        if (!$produk) {
            return redirect()->to(URL::previous())->with('error', 'Gagal menambah produk kedalam keranjang');
        }

        if ($produk->stok < $validateData['jumlah_produk']) {
            return redirect()->to(URL::previous())->with('error', 'Stok produk tidak mencukupi');
        }

        // Check if the product already exists in the detail_penjualans table
        $existingRecord = detail_penjualan::where('id_produk', $validateData['id_produk'])
            ->where('kode_penjualan', $validateData['kode_penjualan'])
            ->first();

        if ($existingRecord) {
            // If the record exists, update the jumlah_produk
            $existingRecord->jumlah_produk += $validateData['jumlah_produk'];
            $existingRecord->subtotal += $produk->harga * $validateData['jumlah_produk'];
            $existingRecord->save();
        } else {
            // If the record doesn't exist, create a new one
            $sub_total = $produk->harga * $validateData['jumlah_produk'];
            $validateData['subtotal'] = $sub_total;
            detail_penjualan::create($validateData);
        }

        // Update the stock
        $produk->stok -= $validateData['jumlah_produk'];
        $produk->save();

        return redirect()->to(URL::previous())->with('success', 'Berhasil menambah keranjang!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete_keranjang($id_detail, $id_produk)
    {
        $data = detail_penjualan::find($id_detail);
        $jumlah = optional($data)->jumlah_produk;
        $data2 = Produk::where('id', $id_produk)->first();
        $stok_old =  $data2->stok;

        $stok_now =  $jumlah + $stok_old;
        $data3 = Produk::where('id', $id_produk);
        $data3->update(['stok' => $stok_now]);
        detail_penjualan::destroy($id_detail);
        return redirect()->to(URL::previous())->with('success', 'Berhasil menghapus produk dari  keranjang!');
    }
}
