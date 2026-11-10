@extends('layouts.app')

@section('title', 'Tambah Supplier')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Tambah Supplier</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('supplier.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_supplier">Nama Supplier</label>
                    <input type="text" name="nama_supplier" id="nama_supplier" value="{{ old('nama_supplier') }}"
                        class="form-control @error('nama_supplier') is-invalid @enderror">
                    @error('nama_supplier')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3"
                        class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
