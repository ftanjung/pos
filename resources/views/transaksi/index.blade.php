@extends('layouts.index')

@section('title', 'Transaksi')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Transaksi</h1>
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Transaksi
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>No. Nota</th>
                        <th>Tanggal</th>
                        <th>Kasir</th>
                        <th class="text-center">Barang</th>
                        <th class="text-right">Total</th>
                        <th class="text-right">Dibayar</th>
                        <th width="100">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksis as $t)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>TRX-{{ str_pad($t->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $t->tanggal_transaksi->format('d/m/Y') }}</td>
                            <td>{{ $t->user->name }}</td>
                            <td class="text-center">{{ $t->details_count }}</td>
                            <td class="text-right">Rp {{ number_format($t->total_belanja, 0, ',', '.') }}</td>
                            <td class="text-right">Rp {{ number_format($t->pay, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('transaksi.show', $t) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-receipt"></i> Nota
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Belum ada transaksi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
