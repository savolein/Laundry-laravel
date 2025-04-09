<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.dashboard', compact('orders'));
    }

    public function AdminDashboard()
    {
        $orders = Order::get();
        return view('admin.dashboard', compact('orders'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        // Debugging
        \Log::info('Admin reservation data received: ', $request->all());

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'pickup_date' => 'required|date',
            'pickup_time' => 'required',
            'laundry_type' => 'required|string|max:255',
            'weight_estimation' => 'required|numeric',
            'price' => 'required|numeric',
            'special_instructions' => 'nullable|string',
        ]);

        // Debugging
        \Log::info('Admin validated data: ', $request->all());

        Order::create([
            'customer_name' => $request->customer_name,
            'contact' => $request->contact,
            'pickup_date' => $request->pickup_date,
            'pickup_time' => $request->pickup_time,
            'laundry_type' => $request->laundry_type,
            'weight_estimation' => $request->weight_estimation,
            'price' => $request->price,
            'special_instructions' => $request->special_instructions,
            'status' => 'Pending',
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Order created successfully');
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'pickup_date' => 'required|date',
            'pickup_time' => 'required',
            'laundry_type' => 'required|string|max:255',
            'weight_estimation' => 'required|numeric',
            'price' => 'required|numeric',
            'special_instructions' => 'nullable|string',
        ]);

        $order = Order::findOrFail($id);
        $order->customer_name = $request->customer_name;
        $order->contact = $request->contact;
        $order->pickup_date = $request->pickup_date;
        $order->pickup_time = $request->pickup_time;
        $order->laundry_type = $request->laundry_type;
        $order->weight_estimation = $request->weight_estimation;
        $order->price = $request->price;
        $order->special_instructions = $request->special_instructions;
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.dashboard')->with('success', 'Order updated successfully');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Order deleted successfully');
    }
}