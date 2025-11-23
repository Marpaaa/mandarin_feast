<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasir;

class KasirController extends Controller
{
    public function index()
    {
        $kasir = Kasir::all();
        return view('kasir.index', compact('kasir'));
    }

    public function create()
    {
        return view('kasir.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nama' => 'required|string|max:100',
            'Shift' => 'required|in:Pagi,Siang,Malam',
        ]);

        Kasir::create($request->all());
        return redirect()->route('kasir.index')->with('success', 'Kasir berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kasir = Kasir::findOrFail($id);
        return view('kasir.edit', compact('kasir'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama' => 'required|string|max:100',
            'Shift' => 'required|in:Pagi,Siang,Malam',
        ]);

        $kasir = Kasir::findOrFail($id);
        $kasir->update($request->all());

        return redirect()->route('kasir.index')->with('success', 'Kasir berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kasir = Kasir::findOrFail($id);
        $kasir->delete();
        return redirect()->route('kasir.index')->with('success', 'Kasir berhasil dihapus.');
    }
}
