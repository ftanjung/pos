<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::latest()->get();

        return view('kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kategori' => 'required|max:100|unique:kategoris',
        ]);

        Kategori::create($data);

        return redirect()->route('kategori.index')->with('success', 'Kategori ditambahkan');
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $data = $request->validate([
            'nama_kategori' => 'required|max:100|unique:kategoris,nama_kategori,' . $kategori->id,
        ]);

        $kategori->update($data);

        return redirect()->route('kategori.index')->with('success', 'Kategori diubah');
    }

    public function destroy(Kategori $kategori)
    {
        if ($kategori->produks()->exists()) {
            return back()->with('error', 'Kategori masih dipakai produk, tidak bisa dihapus');
        }

        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori dihapus');
    }
}
