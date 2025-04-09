<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    public function updated(Order $order)
    {
        if ($order->wasChanged('price') && $order->transaction) {
            $order->transaction->update([
                'total_price' => $order->price,
            ]);
        }
    }
}
