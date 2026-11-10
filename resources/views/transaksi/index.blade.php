@extends('layouts.index')

@section('title', 'Transaksi')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Transaksi</h1>
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Transaksi
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
        </div>
    </div>
@endsection
