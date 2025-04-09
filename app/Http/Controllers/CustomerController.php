<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Service;

class CustomerController extends Controller
{
    public function index()
    {
        $services = Service::all(); // Ambil semua layanan dari database
        return view('customer.customer', compact('services'));
    }

    public function reservationForm()
    {
        return view('customer.reservation');
    }

    public function laundryTypes()
    {
        $services = [
            ['type' => 'Reguler', 'price' => 6000, 'description' => 'Layanan laundry reguler dengan harga Rp 6.000 per kg.'],
            ['type' => 'Express', 'price' => 10000, 'description' => 'Layanan laundry express dengan harga Rp 10.000 per kg.'],
            ['type' => 'VIP', 'price' => 20000, 'description' => 'Layanan laundry VIP dengan harga Rp 20.000 per kg.'],
        ];
        
        return view('customer.laundry-types', compact('services'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:8',
        ]);

        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('customer.index')->with('success', 'Customer created successfully.');
    }

    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'password' => 'sometimes|nullable|min:8',
        ]);

        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $customer->password,
        ]);

        return redirect()->route('customer.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Customer deleted successfully.');
    }
}