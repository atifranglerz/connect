<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code', 'user_bid_id', 'vendor_bid_id', 'garage_id', 'transaction_id', 'payment_type', 'total', 'status','reason','paid_by'
    ];

    public function vendorbid()
    {
        return $this->belongsTo(VendorBid::class, 'vendor_bid_id', 'id');
    }

    public function userbid()
    {
        return $this->belongsTo(UserBid::class, 'user_bid_id', 'id');
    }
}
