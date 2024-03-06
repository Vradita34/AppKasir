<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatepelangganRequest;


class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = pelanggan::all();
        return view('pages.pelanggan', ['title' => 'Pelanggan', 'pelanggan' => $pelanggan]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'no_telp' => 'required|numeric'
        ]);

        Pelanggan::create($validateData);

        return redirect()->route('show.pelanggan')->with('success', 'Berhasil Menambah data pelanggan :D');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pelanggan $pelanggan)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'no_telp' => 'required|numeric'
        ]);

        $pelanggan->update($validateData);

        return redirect()->route('show.pelanggan')->with('success', 'Berhasil Mengubah data pelanggan :D');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pelanggan::destroy($id);

        return redirect()->route('show.pelanggan')->with('success', 'Berhasil Menghapus data pelanggan :D');
    }
}
