<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Models\Menu;
    

class MenuController extends Controller
{
    public function index()
    {
        $menu = DB::table('menu')->get();
        return view('menu.index', compact('menu'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'Nama_Menu' => 'required',
        'Jenis' => 'required',
        'Harga' => 'required|numeric',
        'Status_Ketersediaan' => 'required',
        'Gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $menu = new Menu;
    $menu->Nama_Menu = $request->Nama_Menu;
    $menu->Jenis = $request->Jenis;
    $menu->Harga = $request->Harga;
    $menu->Status_Ketersediaan = $request->Status_Ketersediaan;

    if ($request->hasFile('Gambar')) {
        $menu->Gambar = file_get_contents($request->file('Gambar')->getRealPath());
    }

    $menu->save();

    return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan.');
}

    public function edit($id)
    {
        $menu = DB::table('menu')->where('ID_Menu', $id)->first();
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'Nama_Menu' => $request->Nama_Menu,
            'Jenis' => $request->Jenis,
            'Harga' => $request->Harga,
            'Status_Ketersediaan' => $request->Status_Ketersediaan
        ];

        if ($request->hasFile('Gambar')) {
            $data['Gambar'] = $request->file('Gambar')->store('gambar_menu', 'public');
        }

        DB::table('menu')->where('ID_Menu', $id)->update($data);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('menu')->where('ID_Menu', $id)->delete();
        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus.');
    }

    public function tampilGambar($id)
{
    $menu = \App\Models\Menu::findOrFail($id);

    if (!$menu->Gambar) {
        abort(404);
    }

    return Response::make($menu->Gambar, 200, [
        'Content-Type' => 'image/png',
        'Content-Disposition' => 'inline; filename="gambar.png"',
    ]);
}
}
