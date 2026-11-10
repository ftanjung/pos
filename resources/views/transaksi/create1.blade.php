@extends('layouts.index')

@section('title', 'Transaksi Baru')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Transaksi Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <div class="card shadow mb-4">
            <div class="card-header font-weight-bold text-primary">Daftar Barang</div>
            <div class="card-body">
                <div id="daftar">
                    <div class="form-row baris">
                        <div class="form-group col-md-8">
                            <label>Produk</label>
                            <select name="items[0][produk_id]" class="form-control">
                                @foreach ($produks as $p)
                                    <option value="{{ $p->id }}">
                                        {{ $p->kode }} - {{ $p->nama }} (Rp {{ number_format($p->harga, 0, ',', '.') }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Jumlah</label>
                            <input type="number" name="items[0][jumlah]" value="1" min="1" class="form-control">
                        </div>
                    </div>
                </div>

                <button type="button" id="tambah" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah Baris
                </button>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header font-weight-bold text-primary">Pembayaran</div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="pay">Uang Dibayar</label>
                        <input type="number" name="pay" id="pay" min="0" value="{{ old('pay') }}" class="form-control">
                    </div>
                </div>

                <button class="btn btn-primary">Simpan Transaksi</button>
                <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </form>

    <script>
        let i = 1;
        document.getElementById('tambah').onclick = () => {
            const baris = document.querySelector('.baris').cloneNode(true);
            baris.innerHTML = baris.innerHTML.replaceAll('items[0]', `items[${i++}]`);
            document.getElementById('daftar').append(baris);
        };
    </script>
@endsection
