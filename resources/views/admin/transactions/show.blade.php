@extends('layouts.app')

@section('title', 'Transaction Details')

@section('content')
<div class="container">
    <h2>Transaction Details</h2>
    <div class="form-group">
        <label for="order_id">Order ID</label>
        <input type="text" class="form-control" id="order_id" name="order_id" value="{{ $transaction->order_id }}" readonly>
    </div>
    <div class="form-group">
        <label for="customer_name">Customer Name</label>
        <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $transaction->customer_name }}" readonly>
    </div>
    <div class="form-group">
        <label for="contact">Contact</label>
        <input type="text" class="form-control" id="contact" name="contact" value="{{ $transaction->contact }}" readonly>
    </div>
    <div class="form-group">
        <label for="laundry_type">Laundry Type</label>
        <input type="text" class="form-control" id="laundry_type" name="laundry_type" value="{{ $transaction->laundry_type }}" readonly>
    </div>
    <div class="form-group">
        <label for="total_price">Total Price</label>
        <input type="number" class="form-control" id="total_price" name="total_price" value="{{ $transaction->total_price }}" readonly>
    </div>
    <div class="form-group">
        <label for="payment_method">Payment Method</label>
        <input type="text" class="form-control" id="payment_method" name="payment_method" value="{{ $transaction->payment_method }}" readonly>
    </div>
    <div class="form-group">
        <label for="payment_status">Payment Status</label>
        <input type="text" class="form-control" id="payment_status" name="payment_status" value="{{ $transaction->payment_status }}" readonly>
    </div>
    <a href="{{ route('admin.transactions') }}" class="btn btn-primary">Back to Transactions</a>
</div>
@endsection