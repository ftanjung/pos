@extends('layouts.app')

@section('title', 'Metode Pembayaran')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Metode Pembayaran</h1>
        <a href="{{ route('metode-pembayaran.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Metode Pembayaran
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>Nama Metode Pembayaran</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($metode_pembayarans as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->nama_metode_pembayaran }}</td>
                            <td>
                                <a href="{{ route('metode-pembayaran.edit', $k) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('metode-pembayaran.destroy', $k) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus metode pembayaran ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Belum ada data metode pembayaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
