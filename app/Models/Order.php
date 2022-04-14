<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code', 'user_bid_id', 'vendor_bid_id', 'garage_id', 'transaction_id', 'payment_type', 'total', 'status',
    ];
}
