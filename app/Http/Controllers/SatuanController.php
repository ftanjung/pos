<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $satuans = Satuan::latest()->get();

        return view('satuan.index', compact('satuans'));
    }

    public function create()
    {
        return view('satuan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_satuan' => 'required|max:100|unique:satuans',
        ]);

        Satuan::create($data);

        return redirect()->route('satuan.index')->with('success', 'Satuan ditambahkan');
    }

    public function edit(Satuan $satuan)
    {
        return view('satuan.edit', compact('satuan'));
    }

    public function update(Request $request, Satuan $satuan)
    {
        $data = $request->validate([
            'nama_satuan' => 'required|max:100|unique:satuans,nama_satuan,' . $satuan->id,
        ]);

        $satuan->update($data);

        return redirect()->route('satuan.index')->with('success', 'Satuan diubah');
    }

    public function destroy(Satuan $satuan)
    {
        if ($satuan->produks()->exists()) {
            return back()->with('error', 'Satuan masih dipakai produk, tidak bisa dihapus');
        }

        $satuan->delete();

        return redirect()->route('satuan.index')->with('success', 'Satuan dihapus');
    }
}
