<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koki;

class KokiController extends Controller
{
    public function index()
    {
        $koki = Koki::all();
        return view('koki.index', compact('koki'));
    }

    public function create()
    {
        return view('koki.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nama' => 'required',
            'Shift' => 'required',
        ]);

        Koki::create($request->all());

        return redirect()->route('koki.index')->with('success', 'Data koki berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $koki = Koki::findOrFail($id);
        return view('koki.edit', compact('koki'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama' => 'required',
            'Shift' => 'required',
        ]);

        $koki = Koki::findOrFail($id);
        $koki->update($request->all());

        return redirect()->route('koki.index')->with('success', 'Data koki berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $koki = Koki::findOrFail($id);
        $koki->delete();

        return redirect()->route('koki.index')->with('success', 'Data koki berhasil dihapus.');
    }
}
