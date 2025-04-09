<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('admin.transactions', compact('transactions'));
    }

    public function create()
    {
        return view('admin.transactions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id|unique:transactions,order_id',
            'customer_name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'laundry_type' => 'required|string|max:255',
            'total_price' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
            'payment_status' => 'required|string|max:255',
        ]);

        Transaction::create($request->all());

        return redirect()->route('admin.transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function show(Transaction $transaction)
    {
        return view('admin.transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        return view('admin.transactions.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id|unique:transactions,order_id,' . $transaction->id,
            'customer_name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'laundry_type' => 'required|string|max:255',
            'total_price' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
            'payment_status' => 'required|string|max:255',
        ]);

        $transaction->update($request->all());

        return redirect()->route('admin.transactions')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('admin.transactions')->with('success', 'Transaction deleted successfully.');
    }
}