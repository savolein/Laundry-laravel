<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry Reservation</title>
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
        <a href="{{ route('customer.laundry.types') }}" class="btn btn-outline-light btn-sm mb-3 shadow-sm back-btn">
            <i class="fas fa-arrow-left"></i> Back
        </a>
        <h2 class="text-center mb-4 fw-bold text-uppercase title-gradient">Laundry Reservation Form</h2>
        <div class="form-container">
            <form action="{{ route('customer.reservation.store') }}" method="POST" onsubmit="return validateForm()">
                @csrf
                <div class="form-group">
                    <label for="customer_name">Nama</label>
                    <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                </div>
                <div class="form-group">
                    <label for="contact">No Telpon</label>
                    <input type="text" class="form-control" id="contact" name="contact" required>
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="pickup_date">Tanggal Antar Pakaian ke Laundry</label>
                    <input type="date" class="form-control" id="pickup_date" name="pickup_date" required>
                </div>
                <div class="form-group">
                    <label for="pickup_time">Waktu Antar</label>
                    <input type="time" class="form-control" id="pickup_time" name="pickup_time" required>
                </div>
                <div class="form-group">
                    <label for="laundry_type">Tipe Laundry</label>
                    <select class="form-control" id="laundry_type" name="laundry_type" required onchange="calculatePrice()">
                        <option value="" disabled selected>Pilih Tipe Laundry</option>
                        <option value="Reguler" data-price="6000">Reguler (Rp 6.000 / kg)</option>
                        <option value="Express" data-price="10000">Express (Rp 10.000 / kg)</option>
                        <option value="VIP" data-price="20000">VIP (Rp 20.000 / kg)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="weight_estimation">Estimasi Berat Pakaian (kg)</label>
                    <input type="number" class="form-control" id="weight_estimation" name="weight_estimation" step="0.1" required oninput="calculatePrice()">
                </div>
                <div class="form-group">
                    <label for="special_instructions">Special Instructions</label>
                    <textarea class="form-control" id="special_instructions" name="special_instructions"></textarea>
                </div>
                <input type="hidden" id="price" name="price">
                <div class="form-group">
                    <label for="price_display">Harga (Rp)</label>
                    <input type="text" class="form-control" id="price_display" readonly>
                </div>
                <button type="submit" class="btn btn-primary btn-hover">Submit Reservation</button>
            </form>
        </div>
    </div>

    <div class="bokeh"></div>
    <div class="bokeh"></div>
    <div class="bokeh"></div>

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
</body>
</html>