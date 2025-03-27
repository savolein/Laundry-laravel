<?php

namespace App\Http\Controllers;

use App\Models\OrderanLaundry;
use Illuminate\Http\Request;

class OrderanLaundryController extends Controller
{
    public function index()
    {
        $orders = OrderanLaundry::all();
        return view('orderan_laundry.index', compact('orders'));
    }

    public function create()
    {
        return view('orderan_laundry.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'item' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        OrderanLaundry::create($request->all());

        return redirect()->route('orderan_laundry.index')->with('success', 'Order created successfully.');
    }

    public function show(OrderanLaundry $orderanLaundry)
    {
        return view('orderan_laundry.show', compact('orderanLaundry'));
    }

    public function edit(OrderanLaundry $orderanLaundry)
    {
        return view('orderan_laundry.edit', compact('orderanLaundry'));
    }

    public function update(Request $request, OrderanLaundry $orderanLaundry)
    {
        $request->validate([
            'customer_name' => 'required',
            'item' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $orderanLaundry->update($request->all());

        return redirect()->route('orderan_laundry.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(OrderanLaundry $orderanLaundry)
    {
        $orderanLaundry->delete();

        return redirect()->route('orderan_laundry.index')->with('success', 'Order deleted successfully.');
    }
}