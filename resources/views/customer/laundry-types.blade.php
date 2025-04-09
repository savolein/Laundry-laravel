<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jenis Layanan Laundry</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        /* Import Font */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Montserrat:wght@700&display=swap');

        /* Background Pakai Pattern & Animasi */
        body {
            background: url('https://www.transparenttextures.com/patterns/black-paper.png'), linear-gradient(120deg, #e0eafc, #cfdef3);
            animation: gradientShift 6s infinite alternate ease-in-out;
            position: relative;
        }

        @keyframes gradientShift {
            0% { background: linear-gradient(120deg, #e0eafc, #cfdef3); }
            100% { background: linear-gradient(120deg, #cfdef3, #e0eafc); }
        }

        /* Efek Bokeh Light */
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

        /* Styling Title */
        .title-gradient {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 2.2rem;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);
        }

        /* Styling Card */
        .service-card {
            width: 100%;
            max-width: 320px;
            border-radius: 15px;
            padding: 20px;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        /* Border Neon Glow */
        .service-card::before {
            content: "";
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            z-index: -1;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.2);
            filter: blur(10px);
        }

        /* Hover Floating Effect */
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        /* Ikon dengan Glow Effect */
        .icon-container {
            font-size: 50px;
            color: white;
            margin-bottom: 10px;
            text-shadow: 0px 0px 15px rgba(255, 255, 255, 0.8);
            animation: float 3s infinite ease-in-out;
        }

        /* Animasi Floating */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        /* Divider dengan Efek Blink */
        .divider {
            height: 3px;
            width: 50px;
            background-color: white;
            border: none;
            margin: 10px auto;
            animation: blink 1.5s infinite alternate ease-in-out;
        }

        @keyframes blink {
            0% { background-color: white; opacity: 1; }
            100% { background-color: yellow; opacity: 0.6; }
        }

        /* Tombol dengan Animasi */
        .btn-hover {
            transition: background 0.3s ease-in-out, transform 0.2s, box-shadow 0.3s ease-in-out;
        }

        .btn-hover:hover {
            background: #ff5733;
            transform: scale(1.1);
            box-shadow: 0 0 15px rgba(255, 87, 51, 0.8);
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .service-card {
                max-width: 90%;
            }
            .title-gradient {
                font-size: 1.8rem;
            }
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

    </style>
</head>
<body>
    <div class="container py-5">
    <a href="{{ route('customer.page') }}" class="btn btn-outline-light btn-sm mb-3 shadow-sm back-btn">
    <i class="fas fa-arrow-left"></i> Back
</a>
        <h2 class="text-center mb-4 fw-bold text-uppercase title-gradient">Jenis Layanan Laundry</h2>

        <div class="row justify-content-center">
            @foreach($services as $index => $service)
                @php
                    // Gradasi warna kartu (biar nggak monoton)
                    $gradients = [
                        'linear-gradient(135deg, #6a11cb, #2575fc)',
                        'linear-gradient(135deg, #ffcc00, #ff5733)',
                        'linear-gradient(135deg, #9b59b6, #8e44ad)'
                    ];

                    // Pilih icon berdasarkan jenis layanan
                    if (stripos($service['type'], 'express') !== false) {
                        $iconClass = 'fa-bolt'; // ⚡ Petir
                    } elseif (stripos($service['type'], 'vip') !== false) {
                        $iconClass = 'fa-crown'; // 👑 Mahkota
                    } elseif (stripos($service['type'], 'reguler') !== false) {
                        $iconClass = 'fa-tshirt'; // 👕 Baju
                    } else {
                        $randomIcons = ['fa-hanger', 'fa-bath', 'fa-soap'];
                        $iconClass = $randomIcons[array_rand($randomIcons)];
                    }

                    $bgGradient = $gradients[$index % count($gradients)];
                @endphp
                <div class="col-md-4 d-flex justify-content-center">
                    <div class="card service-card mb-4" style="background: {{ $bgGradient }}">
                        <div class="card-body text-center">
                            <div class="icon-container">
                                <i class="fas {{ $iconClass }}"></i>
                            </div>
                            <h5 class="card-title fw-bold text-white">{{ $service['type'] }}</h5>
                            <hr class="divider">
                            <p class="card-text text-white">Harga: <span class="fw-bold">Rp {{ number_format($service['price'], 0, ',', '.') }} / kg</span></p>
                            <p class="card-text text-light">{{ $service['description'] }}</p>
                            <a href="{{ route('customer.reservation.form') }}" class="btn btn-light btn-hover mt-2">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>