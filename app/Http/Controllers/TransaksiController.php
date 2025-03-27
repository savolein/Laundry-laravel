<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\OrderanLaundry;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transactions = Transaksi::all();
        return view('transaksi.index', compact('transactions'));
    }

    public function create()
    {
        $orders = OrderanLaundry::all();
        return view('transaksi.create', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'orderan_laundry_id' => 'required|exists:orderan_laundry,id',
            'amount' => 'required|numeric',
            'transaction_date' => 'required|date',
        ]);

        Transaksi::create($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaction created successfully.');
    }

    public function show(Transaksi $transaksi)
    {
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit(Transaksi $transaksi)
    {
        $orders = OrderanLaundry::all();
        return view('transaksi.edit', compact('transaksi', 'orders'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'orderan_laundry_id' => 'required|exists:orderan_laundry,id',
            'amount' => 'required|numeric',
            'transaction_date' => 'required|date',
        ]);

        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaction deleted successfully.');
    }
}