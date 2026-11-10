@extends('layouts.app')

@section('title', 'Supplier')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Supplier</h1>
        <a href="{{ route('supplier.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Supplier
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($suppliers as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->nama_supplier }}</td>
                            <td>{{ $k->alamat }}</td>
                            <td>
                                <a href="{{ route('supplier.edit', $k) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('supplier.destroy', $k) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus supplier ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada data supplier.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
