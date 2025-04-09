@extends('layouts.app')

@section('title', 'Transaction Data')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #FFD700; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <h3 class="card-title">Transaction Data</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr style="background-color: #87CEEB; color: #fff;">
                                <th>ID</th>
                                <th>Nama Customer</th>
                                <th>Total Pembayaran</th>
                                <th>Tanggal Transaksi</th>
                                <th>Metode Pembayaran</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ $transaction->customer_name }}</td>
                                    <td>{{ number_format($transaction->total_price, 2) }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td>{{ $transaction->payment_method }}</td>
                                    <td>
                                        <a href="{{ route('admin.transactions.edit', $transaction) }}" class="btn btn-warning btn-sm" style="background-color: #FFD700; border: none;">Edit</a>
                                        <a href="{{ route('admin.transactions.show', $transaction) }}" class="btn btn-success btn-sm" style="background-color: #32CD32; border: none;">Show</a>
                                        <form action="{{ route('admin.transactions.destroy', $transaction) }}" method="POST" class="delete-form" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm delete-button" style="background-color: #FF6347; border: none;">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

@if(session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.delete-button').forEach(function(button) {
        button.addEventListener('click', function() {
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
                    this.closest('form').submit();
                }
            });
        });
    });
});
</script>
@endsection