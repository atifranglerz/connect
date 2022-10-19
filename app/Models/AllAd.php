<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllAd extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'url',
        'description',
        'packages',
        'status'
    ];
}
