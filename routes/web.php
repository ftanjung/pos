<?php


use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SatuanController;





































use App\Http\Controllers\MetodePembayaranController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
// use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SupplierController;
use App\Models\Kategori;
use App\Models\MetodePembayaran;
use App\Models\Produk;
use App\Models\Satuan;
use App\Models\Supplier;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $ringkasan = [
        ['label' => 'Kategori', 'jumlah' => Kategori::count(), 'route' => 'kategori.index'],
        ['label' => 'Satuan', 'jumlah' => Satuan::count(), 'route' => 'satuan.index'],
        ['label' => 'Supplier', 'jumlah' => Supplier::count(), 'route' => 'supplier.index'],
        ['label' => 'Metode Pembayaran', 'jumlah' => MetodePembayaran::count(), 'route' => 'metode-pembayaran.index'],
        ['label' => 'Produk', 'jumlah' => Produk::count(), 'route' => 'produk.index'],
    ];

    return view('dashboard', compact('ringkasan'));
})->name('dashboard');

// Route::resource('kategori', KategoriController::class)->except('show');
// Route::resource('satuan', SatuanController::class)->except('show');
// Route::resource('supplier', SupplierController::class)->except('show');
// Route::resource('metode-pembayaran', MetodePembayaranController::class)->except('show');
// Route::resource('produk', ProdukController::class)->except('show');



Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');


Route::get('/satuan', [SatuanController::class, 'index'])->name('satuan.index');
Route::get('/satuan/create', [SatuanController::class, 'create'])->name('satuan.create');
Route::post('/satuan/store', [SatuanController::class, 'store'])->name('satuan.store');
Route::get('/satuan/{satuan}/edit', [SatuanController::class, 'edit'])->name('satuan.edit');
Route::put('/satuan/{satuan}', [SatuanController::class, 'update'])->name('satuan.update');
Route::delete('/satuan/{satuan}', [SatuanController::class, 'destroy'])->name('satuan.destroy');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::put('/produk/{produk}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');



Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/transaksi/{transaksi}', [TransaksiController::class, 'show'])->name('transaksi.show');

