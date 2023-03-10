<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store_mstr extends Model
{
    use HasFactory;
    protected $fillable =[
        'storecode',
        'type_id',
       'sub_city_id',
       'user_id',
    'active'
    
    ];
       public function sub_city(){
           return $this->belongsTo(sub_city::class); 
       }
       public function user(){
           return $this->belongsTo(user::class); 
       }
       public function store_dtl(){
        return $this->hasMany(store_dtl::class); 
    }
    public function purchase_invoice(){
        return $this->hasMany(invoice_parchase_entity::class); 
    }
    public function type_id(){
        return $this->belongsTo(option::class); 
    }

}
