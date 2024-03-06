<?php

namespace App\Http\Controllers;

use App\Models\temp;
use App\Models\produk;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

class TempController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function tambahKeranjang(Request $request)
    {
        $validateData = $request->validate([
            'id_produk' => 'required',
            'jumlah' => 'required|numeric',
            'id_pelanggan' => 'required',
            'id_users' => 'required',
        ]);

        $produk = Produk::find($validateData['id_produk']);

        if (!$produk) {
            return redirect()->to(URL::previous())->with('error', 'Gagal menambah produk kedalam keranjang');
        }

        if ($produk->stok < $validateData['jumlah']) {
            return redirect()->to(URL::previous())->with('error', 'Stok produk tidak mencukupi');
        }

        // Check if the product already exists in the tenp table
        $existingRecord = temp::where('id_produk', $validateData['id_produk'])->first();

        if ($existingRecord) {
            // If the record exists, update the jumlah_produk
            $existingRecord->jumlah += $validateData['jumlah'];
            $existingRecord->save();
        } else {
            // If the record doesn't exist, create a new one
            temp::create($validateData);
        }

        return redirect()->to(URL::previous())->with('success', 'Berhasil menambah keranjang!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete_keranjang($id_temp)
    {
        temp::destroy($id_temp);
        return redirect()->to(URL::previous())->with('success', 'Berhasil menghapus produk dari  keranjang!');
    }
}
