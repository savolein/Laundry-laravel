@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pemesanan Layanan: {{ $service->name }}</h1>
    <form method="POST" action="{{ route('order.store') }}">
        @csrf
        <div class="form-group">
            <label for="weight">Berat (Kg)</label>
            <input type="number" class="form-control" id="weight" name="weight" min="1" required>
        </div>

        <div class="form-group">
            <label for="days">Jumlah Hari</label>
            <input type="number" class="form-control" id="days" name="days" min="1" required>
        </div>

        <input type="hidden" name="service_id" value="{{ $service->id }}">
        <button type="submit" class="btn btn-success mt-3">Buat Pemesanan</button>
    </form>
</div>
@endsection
