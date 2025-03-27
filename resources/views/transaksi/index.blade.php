@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Transaksi</h1>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Add New Transaction</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Amount</th>
                <th>Transaction Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->orderan_laundry_id }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->transaction_date }}</td>
                    <td>
                        <a href="{{ route('transaksi.edit', $transaction) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('transaksi.destroy', $transaction) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection