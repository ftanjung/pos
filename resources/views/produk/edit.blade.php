@extends('layouts.app')

@section('title', 'Ubah Produk')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Ubah Produk</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('produk.update', $produk) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="kode">Kode</label>
                        <input type="text" name="kode" id="kode" value="{{ old('kode', $produk->kode) }}"
                            class="form-control @error('kode') is-invalid @enderror">
                        @error('kode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-8">
                        <label for="nama">Nama Produk</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama', $produk->nama) }}"
                            class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="harga" min="0" value="{{ old('harga', $produk->harga) }}"
                            class="form-control @error('harga') is-invalid @enderror">
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="kategori_id">Kategori</label>
                        <select name="kategori_id" id="kategori_id"
                            class="form-control @error('kategori_id') is-invalid @enderror">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategoris as $k)
                                <option value="{{ $k->id }}" @selected(old('kategori_id', $produk->kategori_id) == $k->id)>{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="satuan_id">Satuan</label>
                        <select name="satuan_id" id="satuan_id"
                            class="form-control @error('satuan_id') is-invalid @enderror">
                            <option value="">-- Pilih Satuan --</option>
                            @foreach ($satuans as $s)
                                <option value="{{ $s->id }}" @selected(old('satuan_id', $produk->satuan_id) == $s->id)>{{ $s->nama_satuan }}</option>
                            @endforeach
                        </select>
                        @error('satuan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
