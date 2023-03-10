<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unit extends Model
{   
    use HasFactory;
    protected $fillable=[ 'unit_name',
    'no_of_units',
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
    public function store_dtl(){
        return $this->BlongsTomany(store_dtl::class); 
    }
    public function purchase_invoice(){
        return $this->hasMany(invoice_parchase_entity::class); 
    }
}
