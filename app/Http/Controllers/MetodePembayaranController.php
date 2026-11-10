<?php

namespace App\Http\Controllers;

use App\Models\MetodePembayaran;
use Illuminate\Http\Request;

class MetodePembayaranController extends Controller
{
    public function index()
    {
        $metode_pembayarans = MetodePembayaran::latest()->get();

        return view('metode-pembayaran.index', compact('metode_pembayarans'));
    }

    public function create()
    {
        return view('metode-pembayaran.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_metode_pembayaran' => 'required|max:100|unique:metode_pembayarans',
        ]);

        MetodePembayaran::create($data);

        return redirect()->route('metode-pembayaran.index')->with('success', 'Metode pembayaran ditambahkan');
    }

    public function edit(MetodePembayaran $metodePembayaran)
    {
        return view('metode-pembayaran.edit', compact('metodePembayaran'));
    }

    public function update(Request $request, MetodePembayaran $metodePembayaran)
    {
        $data = $request->validate([
            'nama_metode_pembayaran' => 'required|max:100|unique:metode_pembayarans,nama_metode_pembayaran,' . $metodePembayaran->id,
        ]);

        $metodePembayaran->update($data);

        return redirect()->route('metode-pembayaran.index')->with('success', 'Metode pembayaran diubah');
    }

    public function destroy(MetodePembayaran $metodePembayaran)
    {
        $metodePembayaran->delete();

        return redirect()->route('metode-pembayaran.index')->with('success', 'Metode pembayaran dihapus');
    }
}
