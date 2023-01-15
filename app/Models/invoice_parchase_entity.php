<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice_parchase_entity extends Model
{
    use HasFactory;
   protected $fillable=[ 'qty',
   'cost',
   'active',
   'invoice_id',
   'store_id' , 
   'product_id',
   'unit_id',
    'tax',
    'user_id',
    'sub_total'
];
public function purchase_invoice(){
    return $this->belongsTo(purchase_invoice::class); 
}
public function store(){
    return $this->belongsTo(store_mstr::class); 
}
public function product(){
    return $this->belongsTo(product::class); 
}
public function unit(){
    return $this->belongsTo(unit::class); 
}
public function tax(){
    return $this->belongsTo(option::class); 
}
}
