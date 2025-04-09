@extends('layouts.app')

@section('title', 'Edit Transaction')

@section('content')
<div class="container">
    <h2>Edit Transaction</h2>
    <form method="POST" action="{{ route('admin.transactions.update', $transaction) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="order_id">Order ID</label>
            <input type="text" class="form-control" id="order_id" name="order_id" value="{{ $transaction->order_id }}" required>
        </div>
        <div class="form-group">
            <label for="customer_name">Customer Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $transaction->customer_name }}" required>
        </div>
        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" class="form-control" id="contact" name="contact" value="{{ $transaction->contact }}" required>
        </div>
        <div class="form-group">
            <label for="laundry_type">Laundry Type</label>
            <input type="text" class="form-control" id="laundry_type" name="laundry_type" value="{{ $transaction->laundry_type }}" required>
        </div>
        <div class="form-group">
            <label for="total_price">Total Price</label>
            <input type="number" class="form-control" id="total_price" name="total_price" value="{{ $transaction->total_price }}" required>
        </div>
        <div class="form-group">
            <label for="payment_method">Payment Method</label>
            <select class="form-control" id="payment_method" name="payment_method" required>
                <option value="GoPay" {{ $transaction->payment_method == 'GoPay' ? 'selected' : '' }}>GoPay</option>
                <option value="Transfer Bank (BCA)" {{ $transaction->payment_method == 'Transfer Bank (BCA)' ? 'selected' : '' }}>Transfer Bank (BCA)</option>
                <option value="Transfer Bank (BNI)" {{ $transaction->payment_method == 'Transfer Bank (BNI)' ? 'selected' : '' }}>Transfer Bank (BNI)</option>
                <option value="Transfer Bank (BRI)" {{ $transaction->payment_method == 'Transfer Bank (BRI)' ? 'selected' : '' }}>Transfer Bank (BRI)</option>
                <option value="Transfer Bank (Mandiri)" {{ $transaction->payment_method == 'Transfer Bank (Mandiri)' ? 'selected' : '' }}>Transfer Bank (Mandiri)</option>
            </select>
        </div>
        <div class="form-group">
            <label for="payment_status">Payment Status</label>
            <input type="text" class="form-control" id="payment_status" name="payment_status" value="{{ $transaction->payment_status }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Transaction</button>
    </form>
</div>
@endsection