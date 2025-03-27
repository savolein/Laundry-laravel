@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Transaction Details</h1>
    <table class="table">
        <tr>
            <th>Order ID</th>
            <td>{{ $transaksi->orderan_laundry_id }}</td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>{{ $transaksi->amount }}</td>
        </tr>
        <tr>
            <th>Transaction Date</th>
            <td>{{ $transaksi->transaction_date }}</td>
        </tr>
    </table>
</div>
@endsection