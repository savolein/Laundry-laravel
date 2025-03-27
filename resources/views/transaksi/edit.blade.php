@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Transaction</h1>
    <form method="POST" action="{{ route('transaksi.update', $transaksi) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="orderan_laundry_id">Order ID</label>
            <select class="form-control" id="orderan_laundry_id" name="orderan_laundry_id" required>
                @foreach($orders as $order)
                    <option value="{{ $order->id }}" {{ $order->id == $transaksi->orderan_laundry_id ? 'selected' : '' }}>{{ $order->customer_name }} - {{ $order->item }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" value="{{ $transaksi->amount }}" required>
        </div>
        <div class="form-group">
            <label for="transaction_date">Transaction Date</label>
            <input type="date" class="form-control" id="transaction_date" name="transaction_date" value="{{ $transaksi->transaction_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Transaction</button>
    </form>
</div>
@endsection