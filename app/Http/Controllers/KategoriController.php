<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
       return view('kategori.index', [
            'kategoris' => Kategori::all(),
        ]);
    
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kategori' => 'required',
        ]);

        Kategori::create($data);

        return redirect()->route('kategori.index')->with('success', 'Oke Berhasil Ditambahkan');
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $data = $request->validate([
             'nama_kategori' => 'required'
        ]);

        $kategori->update($data);

        return redirect()->route('kategori.index')->with('success', 'Kategori diubah');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori dihapus');
    }
}
