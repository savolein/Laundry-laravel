@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Order</h1>
    <form method="POST" action="{{ route('orderan_laundry.update', $orderanLaundry) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="customer_name">Customer Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $orderanLaundry->customer_name }}" required>
        </div>
        <div class="form-group">
            <label for="item">Item</label>
            <input type="text" class="form-control" id="item" name="item" value="{{ $orderanLaundry->item }}" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $orderanLaundry->quantity }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $orderanLaundry->price }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Order</button>
    </form>
</div>
@endsection