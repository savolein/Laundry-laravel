<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Menampilkan riwayat pesanan customer yang sedang login
    public function history()
    {
        $orders = auth()->user()->orders()->orderBy('created_at', 'desc')->get();
        
        return view('customer.orders.history', compact('orders'));
    }

    // Menampilkan detail pesanan berdasarkan ID
    public function show($id)
    {
        $order = Order::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        
        return view('customer.orders.show', compact('order'));
    }

    public function store(Request $request)
    {
        // Debugging
        \Log::info('Reservation data received: ', $request->all());

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'pickup_date' => 'required|date',
            'pickup_time' => 'required',
            'laundry_type' => 'required|string|max:255',
            'weight_estimation' => 'required|numeric',
            'price' => 'required|numeric',
            'special_instructions' => 'nullable|string',
        ]);

        // Debugging
        \Log::info('Validated data: ', $request->all());

        $order = Order::create([
            'user_id' => auth()->user()->id, // Menyertakan user_id dari user yang sedang login
            'customer_name' => $request->customer_name,
            'contact' => $request->contact,
            'address' => $request->address,
            'pickup_date' => $request->pickup_date,
            'pickup_time' => $request->pickup_time,
            'laundry_type' => $request->laundry_type,
            'weight_estimation' => $request->weight_estimation,
            'price' => $request->price,
            'special_instructions' => $request->special_instructions,
            'status' => 'Pending',
        ]);

        return redirect()->route('payment.form', ['order' => $order->id]);
    }
}