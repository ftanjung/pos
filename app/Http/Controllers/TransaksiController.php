<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('transaksi.index');
    }

    public function create()
    {
        return view('transaksi.create', [
            'produks' => Produk::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pay' => 'required|integer|min:0',
            'items' => 'required|array|min:1',
            'items.*.produk_id' => 'required|exists:produks,id,deleted_at,NULL',
            'items.*.jumlah' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($data) {
            $transaksi = Transaksi::create([
                'tanggal_transaksi' => now(),
                'user_id' => User::first()->id, // sementara, sebelum ada login
                'total_belanja' => 0,
                'pay' => $data['pay'],
            ]);

            $total = 0;
            foreach ($data['items'] as $item) {
                $produk = Produk::findOrFail($item['produk_id']);
                $subtotal = $produk->harga * $item['jumlah'];

                $transaksi->details()->create([
                    'produk_id' => $produk->id,
                    'harga' => $produk->harga,
                    'jumlah' => $item['jumlah'],
                    'subtotal' => $subtotal,
                ]);

                $total += $subtotal;
            }

            $transaksi->update(['total_belanja' => $total]);
        });

        return redirect()->route('transaksi.index')->with('success', 'Transaksi disimpan');
    }
}
