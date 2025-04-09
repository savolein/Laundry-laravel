@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #FFD700; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <h3 class="card-title">Order Laundry</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-sm text-nowrap">
                            <thead>
                                <tr style="background-color: #87CEEB; color: #fff;">
                                    <th>Id</th>
                                    <th>Nama</th>
                                    <th>No Telepon</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Antar</th>
                                    <th>Waktu Antar</th>
                                    <th>Jenis</th>
                                    <th>Berat (kg)</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->user_id }}</td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->contact }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>{{ $order->pickup_date }}</td>
                                        <td>{{ $order->pickup_time }}</td>
                                        <td>{{ $order->laundry_type }}</td>
                                        <td>{{ $order->weight_estimation }}</td>
                                        <td>{{ number_format($order->price, 0, ',', '.') }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            <a href="{{ route('admin.edit', $order) }}" class="btn btn-warning btn-sm" style="background-color: #FFD700; border: none;">Edit</a>
                                            <button class="btn btn-danger btn-sm" style="background-color: #FF6347; border: none;" onclick="confirmDelete({{ $order->id }})">Delete</button>
                                            <form id="delete-form-{{ $order->id }}" action="{{ route('admin.destroy', $order) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href="{{ route('admin.show', $order) }}" class="btn btn-success btn-sm" style="background-color: #32CD32; border: none;">Show</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

<script>
function confirmDelete(orderId) {
    Swal.fire({
        title: 'Anda Yakin?',
        text: "Anda tidak dapat mengembalikannya!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + orderId).submit();
        }
    })
}
</script>
@endsection