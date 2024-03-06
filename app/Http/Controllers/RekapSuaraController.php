<?php

namespace App\Http\Controllers;

use App\Models\rekapsuara;
use Illuminate\Http\Request;

class RekapSuaraController extends Controller
{
    public function index()
    {
        $datarekap = rekapsuara::all();
        return view('pages.rekapsuara', [
            'title' => 'Data Rekap Pemilihan Suara',
            'datarekap' => $datarekap,
        ]);
    }


    public function tambahSuara(Request $request)
    {
        $validator = $request->validate([
            'total_33' => 'required|integer',
            'total_sah_33' => 'required|integer',
            'total_tidaksah_33' => 'required|integer',
            'suara_no1' => 'required|integer',
            'suara_no2' => 'required|integer',
            'suara_no3' => 'required|integer',
            'nama_tps' => 'required|string',
        ]);

        if ($request->total_33 != $request->total_sah_33 + $request->total_tidaksah_33) {
            return back()->withInput()->withErrors($validator)->with('error', 'Total Jumlah Suara salah -_-!');
        } elseif ($request->total_sah_33 != $request->suara_no1 + $request->suara_no2 + $request->suara_no3) {
            return back()->withInput()->withErrors($validator)->with('error', 'Total Jumlah Suara salah pada tiap nomor Urut calon Capres&Cawapres');
        } else {
            rekapsuara::create($validator);
            return redirect()->route('datarekap')->with('success', 'Data rekap suara berhasil di kirim');
        }
    }
}
