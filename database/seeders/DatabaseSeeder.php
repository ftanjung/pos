<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\MetodePembayaran;
use App\Models\Produk;
use App\Models\Satuan;
use App\Models\Supplier;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $makanan = Kategori::create(['nama_kategori' => 'Makanan']);
        $minuman = Kategori::create(['nama_kategori' => 'Minuman']);

        $pcs = Satuan::create(['nama_satuan' => 'pcs']);
        $botol = Satuan::create(['nama_satuan' => 'botol']);
        Satuan::create(['nama_satuan' => 'kg']);

        Supplier::create(['nama_supplier' => 'CV Sumber Rezeki', 'alamat' => 'Jl. Sudirman, Pekanbaru']);

        MetodePembayaran::create(['nama_metode_pembayaran' => 'Tunai']);
        MetodePembayaran::create(['nama_metode_pembayaran' => 'QRIS']);

        Produk::create([
            'kode' => 'P001', 'nama' => 'Roti Coklat', 'harga' => 5000,
            'kategori_id' => $makanan->id, 'satuan_id' => $pcs->id,
        ]);
        Produk::create([
            'kode' => 'P002', 'nama' => 'Air Mineral 600ml', 'harga' => 4000,
            'kategori_id' => $minuman->id, 'satuan_id' => $botol->id,
        ]);
    }
}
