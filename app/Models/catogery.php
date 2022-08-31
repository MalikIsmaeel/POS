<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catogery extends Model
{
    use HasFactory;
    protected $fillable=['catogery_name',
    'description',
    'active',
    'user_id',
    'parent_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function parent()
    {
        return $this->belongsTo(self::class);
    }
    
    public function children()
    {
        return $this->hasMany(self::class);
    }
}
