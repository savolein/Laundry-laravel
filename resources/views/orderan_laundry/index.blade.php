@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Orderan Laundry</h1>
    <a href="{{ route('orderan_laundry.create') }}" class="btn btn-primary">Add New Order</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->item }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price }}</td>
                    <td>
                        <a href="{{ route('orderan_laundry.edit', $order) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('orderan_laundry.destroy', $order) }}" method="POST" style="display:inline;">
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