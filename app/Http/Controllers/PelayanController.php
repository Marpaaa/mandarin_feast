<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelayan;

class PelayanController extends Controller
{
    public function index()
    {
        $pelayan = Pelayan::all();
        return view('pelayan.index', compact('pelayan'));
    }

    public function create()
    {
        return view('pelayan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nama' => 'required|string|max:100',
            'Shift' => 'required|in:Pagi,Siang,Malam',
        ]);

        Pelayan::create($request->all());

        return redirect()->route('pelayan.index')->with('success', 'Pelayan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pelayan = Pelayan::findOrFail($id);
        return view('pelayan.edit', compact('pelayan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama' => 'required|string|max:100',
            'Shift' => 'required|in:Pagi,Siang,Malam',
        ]);

        $pelayan = Pelayan::findOrFail($id);
        $pelayan->update($request->all());

        return redirect()->route('pelayan.index')->with('success', 'Data pelayan diperbarui.');
    }

    public function destroy($id)
    {
        $pelayan = Pelayan::findOrFail($id);
        $pelayan->delete();

        return redirect()->route('pelayan.index')->with('success', 'Data pelayan dihapus.');
    }
}
