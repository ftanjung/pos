@extends('layouts.app')

@section('title', 'Ubah Satuan')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Ubah Satuan</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('satuan.update', $satuan) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_satuan">Nama Satuan</label>
                    <input type="text" name="nama_satuan" id="nama_satuan"
                        value="{{ old('nama_satuan', $satuan->nama_satuan) }}"
                        class="form-control @error('nama_satuan') is-invalid @enderror">
                    @error('nama_satuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('satuan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
