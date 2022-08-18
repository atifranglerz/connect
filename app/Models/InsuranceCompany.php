<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class InsuranceCompany extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $guarded = 'company';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'action',
        'facebook_social_id',
        'google_social_id',
        'image',
        'country',
        'city',
        'address',
        'phone',
        'longitude',
        'latitude',
        'term_condition',
    ];

/**
 * The customer that belong to the InsuranceCompany
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 */
    public function customers()
    {
        return $this->belongsToMany(User::class, 'insurance_user');
    }

/**
 * The vendor that belong to the InsuranceCompany
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 */
    public function vendors()
    {
        return $this->belongsToMany(Vendor::class, 'insurance_vendor',);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = [
        'roles',
    ];
}
