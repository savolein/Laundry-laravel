<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'customer_name', 'contact', 'laundry_type', 'total_price', 'payment_method', 'payment_status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}