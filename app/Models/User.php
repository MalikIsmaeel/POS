<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_name',
        'first_name',
        'meddile_name',
        'last_name',
        'address',
        'phone',
        'active'
    ];

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
    public function catogery()
{
    return $this->belongsTo(catogery::class);
}
public function product()
{
    return $this->belongsTo(product::class);
}
public function unit()
{
    return $this->belongsTo(unit::class);
}
public function countery()
{
    return $this->belongsTo(countery::class);
}
public function supplier(){
    return $this->has(supplier::class); 
}
public function purchase_invoice(){
    return $this->hasMany(invoice_parchase_entity::class); 
}
}
