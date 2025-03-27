@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Transaction</h1>
    <form method="POST" action="{{ route('transaksi.store') }}">
        @csrf
        <div class="form-group">
            <label for="orderan_laundry_id">Order ID</label>
            <select class="form-control" id="orderan_laundry_id" name="orderan_laundry_id" required>
                @foreach($orders as $order)
                    <option value="{{ $order->id }}">{{ $order->customer_name }} - {{ $order->item }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" required>
        </div>
        <div class="form-group">
            <label for="transaction_date">Transaction Date</label>
            <input type="date" class="form-control" id="transaction_date" name="transaction_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Transaction</button>
    </form>
</div>
@endsection