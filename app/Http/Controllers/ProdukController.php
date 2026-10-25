<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Satuan;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::with(['kategori', 'satuan'])->latest()->get();

        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        $satuans = Satuan::all();

        return view('produk.create', compact('kategoris', 'satuans'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode' => 'required|max:20|unique:produks',
            'nama' => 'required|max:100',
            'harga' => 'required|integer|min:0',
            'kategori_id' => 'required|exists:kategoris,id',
            'satuan_id' => 'required|exists:satuans,id',
        ]);

        Produk::create($data);

        return redirect()->route('produk.index')->with('success', 'Produk ditambahkan');
    }

    public function edit(Produk $produk)
    {
        $kategoris = Kategori::all();
        $satuans = Satuan::all();

        return view('produk.edit', compact('produk', 'kategoris', 'satuans'));
    }

    public function update(Request $request, Produk $produk)
    {
        $data = $request->validate([
            'kode' => 'required|max:20|unique:produks,kode,' . $produk->id,
            'nama' => 'required|max:100',
            'harga' => 'required|integer|min:0',
            'kategori_id' => 'required|exists:kategoris,id',
            'satuan_id' => 'required|exists:satuans,id',
        ]);

        $produk->update($data);

        return redirect()->route('produk.index')->with('success', 'Produk diubah');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk dihapus');
    }
}
