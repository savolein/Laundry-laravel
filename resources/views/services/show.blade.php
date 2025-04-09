@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Layanan: {{ $service->name }}</h1>
    <p>Deskripsi: {{ $service->description }}</p>
    <p>Harga per Kg: Rp {{ number_format($service->price_per_kg, 2) }}</p>
    <p>Harga per Hari: Rp {{ number_format($service->price_per_day, 2) }}</p>

    <a href="{{ route('services.order', $service->id) }}" class="btn btn-success">Pesan Layanan Ini</a>
</div>
@endsection
