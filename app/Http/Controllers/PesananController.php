<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Pelanggan;
use App\Models\Menu;
use Carbon\Carbon;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::with(['pelanggan', 'menu'])->get();
        return view('pesanan.index', compact('pesanan'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();
        $menu = Menu::all();
        return view('pesanan.create', compact('pelanggan', 'menu'));
    }

    public function store(Request $request)
    {
        $menu = Menu::findOrFail($request->ID_Menu);
        $total = $request->Jumlah * $menu->Harga;

        Pesanan::create([
            'ID_Pelanggan' => $request->ID_Pelanggan,
            'ID_Menu' => $request->ID_Menu,
            'Jumlah' => $request->Jumlah,
            'Catatan' => $request->Catatan,
            'Total' => $total,
            'Tanggal' => Carbon::now()->toDateString(),
            'Waktu' => Carbon::now()->toTimeString(),
        ]);

        return redirect()->route('pesanan.index');
    }

    public function edit($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pelanggan = Pelanggan::all();
        $menu = Menu::all();
        return view('pesanan.edit', compact('pesanan', 'pelanggan', 'menu'));
    }

    public function update(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $menu = Menu::findOrFail($request->ID_Menu);
        $total = $request->Jumlah * $menu->Harga;

        $pesanan->update([
            'ID_Pelanggan' => $request->ID_Pelanggan,
            'ID_Menu' => $request->ID_Menu,
            'Jumlah' => $request->Jumlah,
            'Catatan' => $request->Catatan,
            'Total' => $total,
            'Tanggal' => Carbon::now()->toDateString(),
            'Waktu' => Carbon::now()->toTimeString(),
        ]);

        return redirect()->route('pesanan.index');
    }

    public function destroy($id)
    {
        Pesanan::destroy($id);
        return redirect()->route('pesanan.index');
    }
    public function pembayaran()
{
    return $this->hasOne(Pembayaran::class, 'ID_Pesanan', 'ID_Pesanan');
}

public function menu()
{
    return $this->belongsTo(Menu::class, 'ID_Menu', 'ID_Menu');
}

public function pelanggan()
{
    return $this->belongsTo(Pelanggan::class, 'ID_Pelanggan', 'ID_Pelanggan');
}



}
