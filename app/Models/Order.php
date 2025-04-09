<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'customer_name', 'contact', 'address', 'pickup_date', 'pickup_time', 'laundry_type', 'weight_estimation', 'price', 'special_instructions', 'status',
    ];

    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the transaction associated with the order.
     */
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}