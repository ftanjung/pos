@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Tambah Kategori</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori</label>
                    <input type="text" name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori') }}"
                        class="form-control @error('nama_kategori') is-invalid @enderror">
                    @error('nama_kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
