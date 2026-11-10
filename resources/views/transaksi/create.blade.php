@extends('layouts.index')

@section('title', 'Tambah Transaksi')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Tambah Transaksi</h1>
    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <div class="card shadow mb-4">
            <div class="card-header font-weight-bold text-primary">Daftar Barang</div>
            <div class="card-body">
                <div id="daftar">
                    <div class="form-row baris">
                        <div class="form-group col-md-7">
                            <label>Produk</label>
                            <select name="items[0][produk_id]" class="form-control">
                                @foreach ($produks as $p)
                                    <option value="{{ $p->id }}">
                                        {{ $p->kode }} - {{ $p->nama }} (Rp
                                        {{ number_format($p->harga, 0, ',', '.') }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Jumlah</label>
                            <input type="number" name="items[0][jumlah]" value="1" min="1"
                                class="form-control">
                        </div>
                        <div class="form-group col-md-2 d-flex align-items-end">
                            <button type="button" class="btn btn-outline-danger btn-block hapus">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
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
                        <input type="number" name="pay" id="pay" min="0" value="{{ old('pay') }}"
                            class="form-control">
                    </div>
                </div>

                <button class="btn btn-primary">Simpan Transaksi</button>
                <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </form>
    <script>
        let i = 1;
        const daftar = document.getElementById('daftar');

        document.getElementById('tambah').onclick = () => {
            const baris = daftar.querySelector('.baris').cloneNode(true);
            baris.innerHTML = baris.innerHTML.replace(/items\[\d+\]/g, `items[${i++}]`);
            daftar.append(baris);
        };

        // Hapus baris, tapi sisakan minimal satu
        daftar.addEventListener('click', (e) => {
            const tombol = e.target.closest('.hapus');
            if (!tombol) return;
            if (daftar.querySelectorAll('.baris').length === 1) {
                alert('Minimal harus ada satu barang.');
                return;
            }
            tombol.closest('.baris').remove();
        });
    </script>

@endsection
