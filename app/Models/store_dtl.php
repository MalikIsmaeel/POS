<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store_dtl extends Model
{
    use HasFactory;
  protected $fillable=[
      'qty',
      'active',
      'product_id',
      'store_id',
      'unit_id',
      'user_id'
];
    public function product(){
        return $this->belongsTo(product::class); 
    }
    public function unit(){
        return $this->belongsTo(unit::class); 
    }
    public function user(){
        return $this->belongsTo(user::class); 
    }
    public function store(){
        return $this->belongsTo(store_mstr::class); 
    }
      
}
// 
//             
