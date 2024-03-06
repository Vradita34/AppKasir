<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;


class ProdukController extends Controller
{

    public function index()
    {
        $produks = Produk::all();

        return view('pages.produks', [
            'title' => 'Produks',
            'produks' => $produks,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required|max:255',
            'harga' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'stok' => 'required|numeric',
        ]);

        $produk = new Produk($validatedData);
        $produk->generateKodeProduk();
        $produk->save();

        return redirect()->route('show.produk')->with('success', 'Berhasil menambah data produk');
    }

    public function update(Request $request, Produk $produk)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required|max:255',
            'harga' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'stok' => 'required|numeric',
        ]);

        $produk->generateKodeProduk();
        $produk->update($validatedData);

        return redirect()->route('show.produk')->with('success', 'Berhasil mengubah data produk');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Produk::destroy($id);

        return redirect()->route('show.produk')->with('success', 'berhasil menghapus data produk');
    }

    // export to excel
    public function export()
    {
        return Excel::download(new ProductExport, 'produk.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new ProductImport, request()->file('file'));
        return redirect()->back();
    }
}
