@extends('layouts.app')

@section('title', 'Tambah Metode Pembayaran')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Tambah Metode Pembayaran</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('metode-pembayaran.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_metode_pembayaran">Nama Metode Pembayaran</label>
                    <input type="text" name="nama_metode_pembayaran" id="nama_metode_pembayaran" value="{{ old('nama_metode_pembayaran') }}"
                        class="form-control @error('nama_metode_pembayaran') is-invalid @enderror">
                    @error('nama_metode_pembayaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('metode-pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
