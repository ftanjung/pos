@extends('layouts.index')

@section('title', 'Kategori')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Kategori</h1>
        <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Kategori
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>Nama Kategori</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategoris as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->nama_kategori }}</td>
                            <td>
                                <a href="{{ route('kategori.edit', $k) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('kategori.destroy', $k) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus kategori ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Belum ada data kategori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
