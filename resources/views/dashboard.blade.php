@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <div class="row">
        @foreach ($ringkasan as $item)
            <div class="col-xl col-md-4 mb-4">
                <a href="{{ route($item['route']) }}" class="text-decoration-none">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ $item['label'] }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item['jumlah'] }}</div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
    