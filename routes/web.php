<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MetodePembayaranController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SatuanController;
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

Route::resource('kategori', KategoriController::class)->except('show');
Route::resource('satuan', SatuanController::class)->except('show');
Route::resource('supplier', SupplierController::class)->except('show');
Route::resource('metode-pembayaran', MetodePembayaranController::class)->except('show');
Route::resource('produk', ProdukController::class)->except('show');
