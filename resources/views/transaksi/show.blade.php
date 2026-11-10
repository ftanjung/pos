@extends('layouts.index')

@section('title', 'Nota Transaksi')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Nota Transaksi</h1>
        <div>
            <button type="button" onclick="window.print()" class="btn btn-primary btn-sm">
                <i class="fas fa-print"></i> Cetak
            </button>
            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
        </div>
    </div>

    <div class="card shadow mb-4" style="max-width: 720px">
        <div class="card-body">
            <div class="text-center mb-4">
                <h4 class="font-weight-bold text-gray-800 mb-1">POS Kasir</h4>
                <div class="text-muted">TRX-{{ str_pad($transaksi->id, 5, '0', STR_PAD_LEFT) }}</div>
            </div>

            <table class="table table-sm table-borderless mb-3">
                <tr>
                    <td width="120">Tanggal</td>
                    <td>: {{ $transaksi->tanggal_transaksi->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td>Kasir</td>
                    <td>: {{ $transaksi->user->name }}</td>
                </tr>
            </table>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th class="text-right">Harga</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi->details as $d)
                        <tr>
                            <td>{{ $d->produk->nama }}</td>
                            <td class="text-right">Rp {{ number_format($d->harga, 0, ',', '.') }}</td>
                            <td class="text-center">{{ $d->jumlah }}</td>
                            <td class="text-right">Rp {{ number_format($d->subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-right">Total</th>
                        <th class="text-right">Rp {{ number_format($transaksi->total_belanja, 0, ',', '.') }}</th>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Dibayar</td>
                        <td class="text-right">Rp {{ number_format($transaksi->pay, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        @if ($transaksi->kembalian >= 0)
                            <td colspan="3" class="text-right">Kembalian</td>
                            <td class="text-right">Rp {{ number_format($transaksi->kembalian, 0, ',', '.') }}</td>
                        @else
                            <td colspan="3" class="text-right text-danger">Kurang bayar</td>
                            <td class="text-right text-danger">Rp {{ number_format(abs($transaksi->kembalian), 0, ',', '.') }}</td>
                        @endif
                    </tr>
                </tfoot>
            </table>

            <p class="text-center text-muted mb-0">Terima kasih sudah berbelanja</p>
        </div>
    </div>
@endsection
