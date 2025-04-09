@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Layanan</h1>
    <div class="row">
        @foreach($services as $service)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $service->name }}</h5>
                    <p class="card-text">{{ $service->description }}</p>
                    <p><strong>Harga per Kg:</strong> Rp {{ number_format($service->price_per_kg, 2) }}</p>
                    <p><strong>Harga per Hari:</strong> Rp {{ number_format($service->price_per_day, 2) }}</p>
                    <a href="{{ route('services.show', $service) }}" class="btn btn-primary">Pilih Layanan</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
