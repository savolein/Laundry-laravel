@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order Details</h1>
    <table class="table">
        <tr>
            <th>Customer Name</th>
            <td>{{ $orderanLaundry->customer_name }}</td>
        </tr>
        <tr>
            <th>Item</th>
            <td>{{ $orderanLaundry->item }}</td>
        </tr>
        <tr>
            <th>Quantity</th>
            <td>{{ $orderanLaundry->quantity }}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{{ $orderanLaundry->price }}</td>
        </tr>
    </table>
</div>
@endsection