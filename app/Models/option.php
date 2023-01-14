<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class option extends Model
{
    use HasFactory;
   protected $fillable=[
    'option_name',
    'option_table',
    'option_value'
            
   ];


    public function purchase_invoice(){
        return $this->hasMany(invoice_parchase_entity::class); 
    }
    public function type_suupplier(){
        return $this->hasMany(supplier::class); 
    }
    public function internal(){
        return $this->hasMany(supplier::class); 
    }
    public function store(){
        return $this->hasMany(store::class); 
    }
}
