<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $fillable = ['transaksi_id', 'produk_id', 'harga', 'jumlah', 'subtotal'];

    public function produk()
    {
        // withTrashed: nota lama tetap bisa dibuka walau produknya sudah dihapus
        return $this->belongsTo(Produk::class)->withTrashed();
    }
}
