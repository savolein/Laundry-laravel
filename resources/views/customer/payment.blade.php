<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Laundry</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Montserrat:wght@700&display=swap');

        body {
            background: url('https://www.transparenttextures.com/patterns/black-paper.png'), linear-gradient(120deg, #e0eafc, #cfdef3);
            animation: gradientShift 6s infinite alternate ease-in-out;
            position: relative;
        }

        @keyframes gradientShift {
            0% { background: linear-gradient(120deg, #e0eafc, #cfdef3); }
            100% { background: linear-gradient(120deg, #cfdef3, #e0eafc); }
        }

        .bokeh {
            position: absolute;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            filter: blur(40px);
            animation: moveBokeh 8s infinite alternate ease-in-out;
        }

        .bokeh:nth-child(1) { top: 20%; left: 10%; }
        .bokeh:nth-child(2) { top: 50%; left: 60%; animation-delay: 2s; }
        .bokeh:nth-child(3) { bottom: 15%; left: 30%; animation-delay: 4s; }

        @keyframes moveBokeh {
            0% { transform: translateY(0) translateX(0); }
            100% { transform: translateY(20px) translateX(30px); }
        }

        .title-gradient {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 2.2rem;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);
        }

        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .form-group label {
            font-weight: bold;
        }

        .payment-logo {
            width: 80px;
            height: 80px;
            margin: 10px;
            cursor: pointer;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .payment-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .payment-logo:hover {
            transform: scale(1.1);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .payment-logo.selected {
            transform: scale(1.2);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
        }

        .back-btn {
            background-color: #ffcc00;
            color: #000;
            border: none;
            font-weight: bold;
            border-radius: 20px;
            padding: 6px 15px;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background-color: #ffc107;
            color: #000;
            box-shadow: 0 0 12px rgba(255, 204, 0, 0.8);
            transform: scale(1.05);
        }

        .btn-hover {
            transition: background 0.3s ease-in-out, transform 0.2s, box-shadow 0.3s ease-in-out;
        }

        .btn-hover:hover {
            background: #ff5733;
            transform: scale(1.1);
            box-shadow: 0 0 15px rgba(255, 87, 51, 0.8);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <a href="{{ route('customer.page') }}" class="btn btn-outline-light btn-sm mb-3 shadow-sm back-btn">
            <i class="fas fa-arrow-left"></i> Back
        </a>
        <h2 class="text-center mb-4 fw-bold text-uppercase title-gradient">Pembayaran Laundry</h2>
        <div class="form-container">
            <form method="POST" action="{{ route('payment.submit') }}">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <div class="form-group">
                    <label for="customer_name">Nama Customer</label>
                    <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $order->customer_name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="contact">Nomor Kontak</label>
                    <input type="text" class="form-control" id="contact" name="contact" value="{{ $order->contact }}" readonly>
                </div>
                <div class="form-group">
                    <label for="laundry_type">Tipe Laundry</label>
                    <input type="text" class="form-control" id="laundry_type" name="laundry_type" value="{{ $order->laundry_type }}" readonly>
                </div>
                <div class="form-group">
                    <label for="total_price">Total Harga</label>
                    <input type="text" class="form-control" id="total_price" name="total_price" value="{{ $order->price }}" readonly>
                </div>
                <div class="form-group">
                    <label for="payment_method">Metode Pembayaran</label>
                    <div class="d-flex flex-wrap justify-content-center">
                        <input type="radio" id="gopay" name="payment_method" value="GoPay" class="d-none">
                        <label for="gopay" class="payment-logo">
                            <img src="{{ asset('foto/Logo_Gopay.svg.png') }}" alt="GoPay">
                        </label>
                        
                        <input type="radio" id="bca" name="payment_method" value="Transfer Bank (BCA)" class="d-none">
                        <label for="bca" class="payment-logo">
                            <img src="{{ asset('foto/Bank_BCA.png') }}" alt="Bank BCA">
                        </label>
                        
                        <input type="radio" id="bni" name="payment_method" value="Transfer Bank (BNI)" class="d-none">
                        <label for="bni" class="payment-logo">
                            <img src="{{ asset('foto/bank_bni.png') }}" alt="Bank BNI">
                        </label>
                        
                        <input type="radio" id="bri" name="payment_method" value="Transfer Bank (BRI)" class="d-none">
                        <label for="bri" class="payment-logo">
                            <img src="{{ asset('foto/bank_bri.png') }}" alt="Bank BRI">
                        </label>

                        <input type="radio" id="mandiri" name="payment_method" value="Transfer Bank (Mandiri)" class="d-none">
                        <label for="mandiri" class="payment-logo">
                            <img src="{{ asset('foto/bank_mandiri.png') }}" alt="Bank Mandiri">
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-hover">Submit Pembayaran</button>
            </form>
        </div>
    </div>

    <div class="bokeh"></div>
    <div class="bokeh"></div>
    <div class="bokeh"></div>

    <script>
    document.querySelectorAll('.payment-logo').forEach(function(logo) {
        logo.addEventListener('click', function() {
            document.querySelectorAll('.payment-logo').forEach(function(l) {
                l.classList.remove('selected');
            });
            this.classList.add('selected');
            document.getElementById(this.htmlFor).checked = true;
        });
    });

    function validateForm() {
        const selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked');
        if (!selectedPaymentMethod) {
            alert('Please select a payment method.');
            return false;
        }
        return true;
    }
    </script>
</body>
</html>