<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Riwayat Pesanan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap & FontAwesome -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <style>
    body {
      background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
      font-family: 'Poppins', sans-serif;
    }

    .container-custom {
      max-width: 900px;
      margin: 50px auto;
      padding: 20px;
    }

    .title {
      font-size: 2.2rem;
      font-weight: 700;
      background: linear-gradient(to right, #4a00e0, #8e2de2);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-align: center;
      margin-bottom: 30px;
    }

    .card-order {
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 8px 18px rgba(0, 0, 0, 0.1);
      padding: 25px;
      margin-bottom: 30px;
      transition: transform 0.3s ease;
    }

    .card-order:hover {
      transform: translateY(-3px);
    }

    .order-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
    }

    .order-info p {
      margin: 5px 0;
      font-size: 15px;
    }

    .order-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
    }

    .order-meta div {
      flex: 1 1 45%;
    }

    .status-badge {
      font-size: 0.85rem;
      padding: 6px 14px;
      border-radius: 20px;
      font-weight: bold;
    }

    .btn-detail {
      border-radius: 25px;
      padding: 6px 20px;
      font-weight: bold;
    }

    .btn-back {
      margin-bottom: 20px;
      border-radius: 20px;
      font-weight: bold;
    }

    @media screen and (max-width: 576px) {
      .order-meta div {
        flex: 1 1 100%;
      }
    }
  </style>
</head>
<body>
  <div class="container container-custom">
    <a href="{{ route('customer.page') }}" class="btn btn-warning btn-sm btn-back">
      <i class="fas fa-arrow-left"></i> Kembali
    </a>

    <h1 class="title">Riwayat Pesanan</h1>

    @forelse ($orders as $order)
      <div class="card-order">
        <div class="order-header">
          <h5><i class="fas fa-user text-primary"></i> {{ $order->customer_name }}</h5>
          <span class="badge status-badge 
            @if($order->status == 'Selesai') bg-success
            @elseif($order->status == 'Diproses') bg-warning text-dark
            @elseif($order->status == 'Dibatalkan') bg-danger
            @else bg-secondary
            @endif">
            <i class="fas fa-info-circle"></i> {{ $order->status }}
          </span>
        </div>

        <div class="order-info">
          <p><i class="fas fa-phone text-success"></i> {{ $order->contact }}</p>
          <p><i class="fas fa-map-marker-alt text-danger"></i> {{ $order->address }}</p>
        </div>

        <hr>

        <div class="order-meta">
          <div>
            <p><i class="fas fa-calendar-alt text-info"></i> <strong>Tanggal Antar:</strong> {{ $order->pickup_date }}</p>
            <p><i class="fas fa-clock text-warning"></i> <strong>Waktu:</strong> {{ $order->pickup_time }}</p>
          </div>
          <div>
            <p><i class="fas fa-tshirt text-purple"></i> <strong>Layanan:</strong> {{ $order->laundry_type }}</p>
            <p><i class="fas fa-weight-hanging text-dark"></i> <strong>Berat:</strong> {{ $order->weight_estimation }} kg</p>
          </div>
        </div>

        <hr>

        <div class="d-flex justify-content-between align-items-center">
          <p class="mb-0">
            <i class="fas fa-money-bill-wave text-success"></i>
            <strong>Total Harga:</strong> Rp {{ number_format($order->price, 0, ',', '.') }}
          </p>
          <a href="{{ route('customer.orders.show', $order->id) }}" class="btn btn-outline-primary btn-detail">
            <i class="fas fa-eye"></i> Detail
          </a>
        </div>
      </div>
    @empty
      <div class="text-center mt-4">
        <p class="text-muted">Belum ada riwayat pesanan.</p>
      </div>
    @endforelse
  </div>
</body>
</html>
