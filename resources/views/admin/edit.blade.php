@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Order') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.update', $order->id) }}" onsubmit="return validateForm()">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="customer_name">{{ __('Customer Name') }}</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $order->customer_name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="contact">{{ __('Contact') }}</label>
                            <input type="text" class="form-control" id="contact" name="contact" value="{{ $order->contact }}" required>
                        </div>

                        <div class="form-group">
                            <label for="pickup_date">{{ __('Pickup Date') }}</label>
                            <input type="date" class="form-control" id="pickup_date" name="pickup_date" value="{{ $order->pickup_date }}" required>
                        </div>

                        <div class="form-group">
                            <label for="pickup_time">{{ __('Pickup Time') }}</label>
                            <input type="time" class="form-control" id="pickup_time" name="pickup_time" value="{{ $order->pickup_time }}" required>
                        </div>

                        <div class="form-group">
                            <label for="laundry_type">{{ __('Laundry Type') }}</label>
                            <select class="form-control" id="laundry_type" name="laundry_type" required onchange="calculatePrice()">
                                <option value="Reguler" data-price="6000" {{ $order->laundry_type == 'Reguler' ? 'selected' : '' }}>Reguler (Rp 6.000 / kg)</option>
                                <option value="Express" data-price="10000" {{ $order->laundry_type == 'Express' ? 'selected' : '' }}>Express (Rp 10.000 / kg)</option>
                                <option value="VIP" data-price="20000" {{ $order->laundry_type == 'VIP' ? 'selected' : '' }}>VIP (Rp 20.000 / kg)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="weight_estimation">{{ __('Estimasi Berat Pakaian (kg)') }}</label>
                            <input type="number" class="form-control" id="weight_estimation" name="weight_estimation" step="0.1" value="{{ $order->weight_estimation }}" required oninput="calculatePrice()">
                        </div>

                        <div class="form-group">
                            <label for="special_instructions">{{ __('Special Instructions') }}</label>
                            <textarea class="form-control" id="special_instructions" name="special_instructions">{{ $order->special_instructions }}</textarea>
                        </div>

                        <input type="hidden" id="price" name="price" value="{{ $order->price }}">
                        <div class="form-group">
                            <label for="price_display">{{ __('Harga (Rp)') }}</label>
                            <input type="text" class="form-control" id="price_display" value="{{ number_format($order->price, 0, ',', '.') }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="status">{{ __('Status Cucian') }}</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="In Progress" {{ $order->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Update Order') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function calculatePrice() {
    const select = document.getElementById('laundry_type');
    const weightInput = document.getElementById('weight_estimation');
    const priceInput = document.getElementById('price');
    const priceDisplay = document.getElementById('price_display');
    const selectedOption = select.options[select.selectedIndex];
    const pricePerKg = selectedOption ? selectedOption.getAttribute('data-price') : 0;
    const weight = parseFloat(weightInput.value) || 0;
    const totalPrice = pricePerKg * weight;
    priceInput.value = totalPrice;
    priceDisplay.value = totalPrice.toLocaleString();
    console.log('Price calculated: ', totalPrice); // Debugging
}

function validateForm() {
    const priceInput = document.getElementById('price');
    if (!priceInput.value) {
        alert('Please select a laundry type and enter the weight.');
        return false;
    }
    console.log('Form submitted with price: ', priceInput.value); // Debugging
    return true;
}
</script>
@endsection