<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBid extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'model_id', 'area_id', 'title', 'car_detail', 'document_image', 'accident_detail', 'status',
    ];
}

