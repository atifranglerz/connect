<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBidCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_bid_id', 'subcategory_id',
    ];
}
