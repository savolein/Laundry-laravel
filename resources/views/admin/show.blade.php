@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order Details</h1>
    <div class="card">
        <div class="card-header">
            <h3>Order #{{ $order->id }}</h3>
        </div>
        <div class="card-body">
            <p>Customer Name: {{ $order->customer_name }}</p>
            <p>Contact: {{ $order->contact }}</p>
            <p>Pickup Date: {{ $order->pickup_date }}</p>
            <p>Pickup Time: {{ $order->pickup_time }}</p>
            <p>Laundry Type: {{ $order->laundry_type }}</p>
            <p>Estimasi Berat Pakaian (kg): {{ $order->weight_estimation }}</p>
            <p>Harga (Rp): {{ number_format($order->price, 0, ',', '.') }}</p>
            <p>Special Instructions: {{ $order->special_instructions }}</p>
            <p>Status: {{ $order->status }}</p>
        </div>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Back to Orders</a>
</div>
@endsection