<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = DB::table('pelanggan')->get();
        return view('Pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
        return view('Pelanggan.create');
    }

    public function store(Request $request)
    {
        DB::table('pelanggan')->insert([
            'Nama' => $request->Nama,
            'Nomor_Telepon' => $request->Nomor_Telepon,
            'Tipe_Kunjungan' => $request->Tipe_Kunjungan,
            'No_Meja' => $request->No_Meja,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pelanggan = DB::table('pelanggan')->where('ID_Pelanggan', $id)->first();
        return view('Pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        DB::table('pelanggan')->where('ID_Pelanggan', $id)->update([
            'Nama' => $request->Nama,
            'Nomor_Telepon' => $request->Nomor_Telepon,
            'Tipe_Kunjungan' => $request->Tipe_Kunjungan,
            'No_Meja' => $request->No_Meja,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('pelanggan')->where('ID_Pelanggan', $id)->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan dihapus.');
    }
}
