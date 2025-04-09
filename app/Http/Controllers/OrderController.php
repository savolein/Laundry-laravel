<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'weight' => 'required|numeric|min:1',
            'days' => 'required|numeric|min:1',
            'service_id' => 'required|exists:services,id',
        ]);

        $service = Service::find($request->service_id);
        $totalPrice = ($service->price_per_kg * $request->weight) + ($service->price_per_day * $request->days);

        Order::create([
            'service_id' => $service->id,
            'user_id' => Auth::id(),
            'weight' => $request->weight,
            'days' => $request->days,
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('customer.page')->with('success', 'Pemesanan berhasil!');
    }
}

