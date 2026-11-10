<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
       return view('satuan.index', [
            'satuans' => Satuan::all(),
        ]);
    
    }

    public function create()
    {
        return view('satuan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_satuan' => 'required',
        ]);

        Satuan::create($data);

        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil ditambahkan');
    }

    public function edit(Satuan $satuan)
    {
        return view('satuan.edit', compact('satuan'));
    }

    public function update(Request $request, Satuan $satuan)
    {
        $data = $request->validate([
             'nama_satuan' => 'required'
        ]);

        $satuan->update($data);

        return redirect()->route('satuan.index')->with('success', 'Satuan diubah');
    }

    public function destroy(Satuan $satuan)
    {
        $satuan->delete();

        return redirect()->route('satuan.index')->with('success', 'Satuan dihapus');
    }
}
