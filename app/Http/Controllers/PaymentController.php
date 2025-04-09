<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Transaction;

class PaymentController extends Controller
{
    public function showForm($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('customer.payment', compact('order'));
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'payment_method' => 'required|string',
        ]);

        $order = Order::findOrFail($request->order_id);

        $transaction = Transaction::create([
            'order_id' => $order->id,
            'customer_name' => $order->customer_name,
            'contact' => $order->contact,
            'laundry_type' => $order->laundry_type,
            'total_price' => $order->price,
            'payment_method' => $request->payment_method,
            'payment_status' => 'Sukses',
        ]);

        return redirect()->route('customer.page')->with('success', 'Pembayaran Berhasil! Terima kasih telah menggunakan layanan kami.');
    }
}