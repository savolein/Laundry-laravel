<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Montserrat:wght@700&display=swap');

        body {
            background: url('https://www.transparenttextures.com/patterns/black-paper.png'), linear-gradient(120deg, #e0eafc, #cfdef3);
            animation: gradientShift 6s infinite alternate ease-in-out;
            font-family: 'Poppins', sans-serif;
            position: relative;
        }

        @keyframes gradientShift {
            0% { background: linear-gradient(120deg, #e0eafc, #cfdef3); }
            100% { background: linear-gradient(120deg, #cfdef3, #e0eafc); }
        }

        .card {
            background: #ffffffc9;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .title-gradient {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 2.5rem;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);
        }

        .list-group-item {
            background: transparent;
            border: none;
            padding-left: 0;
        }

        .list-group-item i {
            width: 24px;
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
            box-shadow: 0 0 12px rgba(255, 204, 0, 0.8);
            transform: scale(1.05);
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
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="title-gradient">🧺 Detail Pesanan</h1>
            <p class="text-muted">Lihat informasi lengkap dari pesanan laundry Anda</p>
        </div>

        <div class="card p-4">
            <h4 class="mb-4"><i class="bi bi-receipt me-2"></i>Pesanan #{{ $order->id }}</h4>

            <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="bi bi-person-fill text-primary"></i> <strong>Nama:</strong> {{ $order->customer_name }}</li>
                <li class="list-group-item"><i class="bi bi-telephone text-success"></i> <strong>Telepon:</strong> {{ $order->contact }}</li>
                <li class="list-group-item"><i class="bi bi-geo-alt-fill text-danger"></i> <strong>Alamat:</strong> {{ $order->address }}</li>
                <li class="list-group-item"><i class="bi bi-calendar-check text-warning"></i> <strong>Tanggal Antar:</strong> {{ $order->pickup_date }}</li>
                <li class="list-group-item"><i class="bi bi-clock-history text-info"></i> <strong>Waktu Antar:</strong> {{ $order->pickup_time }}</li>
                <li class="list-group-item"><i class="bi bi-gear text-secondary"></i> <strong>Jenis Pelayanan:</strong> {{ $order->laundry_type }}</li>
                <li class="list-group-item"><i class="bi bi-box text-dark"></i> <strong>Berat (kg):</strong> {{ $order->weight_estimation }}</li>
                <li class="list-group-item"><i class="bi bi-cash-stack text-success"></i> <strong>Harga:</strong> Rp {{ number_format($order->price, 0, ',', '.') }}</li>
                <li class="list-group-item"><i class="bi bi-chat-dots text-muted"></i> <strong>Instruksi Khusus:</strong> {{ $order->special_instructions }}</li>
                <li class="list-group-item">
                    <i class="bi bi-info-circle text-info"></i> <strong>Status:</strong>
                    <span class="badge
                        @if($order->status == 'Selesai') bg-success
                        @elseif($order->status == 'Diproses') bg-warning text-dark
                        @elseif($order->status == 'Menunggu') bg-secondary
                        @elseif($order->status == 'Dibatalkan') bg-danger
                        @else bg-info
                        @endif py-2 px-3 rounded-pill">
                        {{ $order->status }}
                    </span>
                </li>
            </ul>

            <div class="text-end mt-4">
                <a href="{{ route('customer.orders.history') }}" class="btn back-btn">
                    <i class="fas fa-arrow-left"></i> Kembali ke Riwayat
                </a>
            </div>
        </div>
    </div>

    <div class="bokeh"></div>
    <div class="bokeh"></div>
    <div class="bokeh"></div>
</body>
</html>