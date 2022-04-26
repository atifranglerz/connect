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
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
    public function model()
    {
        return $this->belongsTo(ModelYear::class, 'model_year_id', 'id');
    }
}

