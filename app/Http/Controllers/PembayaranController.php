<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Pesanan;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = DB::table('pembayaran')
            ->join('pesanan', 'pembayaran.ID_Pesanan', '=', 'pesanan.ID_Pesanan')
            ->join('pelanggan', 'pesanan.ID_Pelanggan', '=', 'pelanggan.ID_Pelanggan')
            ->select('pembayaran.*', 'pelanggan.Nama')
            ->get();

        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $pesananList = DB::table('pesanan')
            ->join('pelanggan', 'pesanan.ID_Pelanggan', '=', 'pelanggan.ID_Pelanggan')
            ->select('pesanan.ID_Pesanan', 'pesanan.Total', 'pelanggan.Nama')
            ->where('pesanan.Status_Pembayaran', '=', 'Belum Dibayar')
            ->get();

        return view('pembayaran.create', compact('pesananList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID_Pesanan' => 'required|exists:pesanan,ID_Pesanan',
            'Metode_Pembayaran' => 'required|in:Tunai,Kartu,QRIS',
            'Total_Bayar' => 'required|integer|min:0',
            'Waktu_Bayar' => 'required|date',
        ]);

        // Simpan ke tabel pembayaran
        Pembayaran::create([
            'ID_Pesanan' => $request->ID_Pesanan,
            'Metode_Pembayaran' => $request->Metode_Pembayaran,
            'Total_Bayar' => $request->Total_Bayar,
            'Waktu_Bayar' => Carbon::parse($request->Waktu_Bayar),
        ]);

        // Update status pembayaran di tabel pesanan
        Pesanan::where('ID_Pesanan', $request->ID_Pesanan)
            ->update(['Status_Pembayaran' => 'Sudah Dibayar']);

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dan status pesanan diperbarui.');
    }

    public function edit($id)
    {
        $pembayaran = DB::table('pembayaran')->where('ID_Pembayaran', $id)->first();

        $pesananList = DB::table('pesanan')
            ->join('pelanggan', 'pesanan.ID_Pelanggan', '=', 'pelanggan.ID_Pelanggan')
            ->select('pesanan.ID_Pesanan', 'pesanan.Total', 'pelanggan.Nama')
            ->get();

        return view('pembayaran.edit', compact('pembayaran', 'pesananList'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_Pesanan' => 'required|exists:pesanan,ID_Pesanan',
            'Metode_Pembayaran' => 'required|in:Tunai,Kartu,QRIS',
            'Total_Bayar' => 'required|integer|min:0',
            'Waktu_Bayar' => 'required|date',
        ]);

        DB::table('pembayaran')->where('ID_Pembayaran', $id)->update([
            'ID_Pesanan' => $request->ID_Pesanan,
            'Metode_Pembayaran' => $request->Metode_Pembayaran,
            'Total_Bayar' => $request->Total_Bayar,
            'Waktu_Bayar' => Carbon::parse($request->Waktu_Bayar),
        ]);

        // Update status pembayaran
        Pesanan::where('ID_Pesanan', $request->ID_Pesanan)
            ->update(['Status_Pembayaran' => 'Sudah Dibayar']);

        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran berhasil diperbarui dan status pesanan diperbarui.');
    }

    public function destroy($id)
    {
        // Ambil ID_Pesanan terlebih dahulu
        $pembayaran = DB::table('pembayaran')->where('ID_Pembayaran', $id)->first();

        if ($pembayaran) {
            // Hapus pembayaran
            DB::table('pembayaran')->where('ID_Pembayaran', $id)->delete();

            // Ubah status pesanan menjadi Belum Dibayar kembali
            Pesanan::where('ID_Pesanan', $pembayaran->ID_Pesanan)
                ->update(['Status_Pembayaran' => 'Belum Dibayar']);
        }

        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran berhasil dihapus dan status pesanan dikembalikan.');
    }

    public function pesanan()
{
    return $this->belongsTo(Pesanan::class, 'ID_Pesanan', 'ID_Pesanan');
}

public function cetak($id)
{
    $pembayaran = Pembayaran::with(['pesanan.menu', 'pesanan.pelanggan'])->findOrFail($id);

    return view('pembayaran.cetak', compact('pembayaran'));
}



}
