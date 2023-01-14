<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sub_city;
class supplier extends Model
{
    use HasFactory;
    protected $fillable=[
    'company_name',
    'tax_id',
    'reqister_id',
    'phone',
    'active',
    'type_id' ,// is he company of indivdual or goverment;
    'sub_city',
    'internal',// is he internal or external or hibrid
    'user_id'];
    public function region(){
        return $this->belongsTo(sub_city::class,'sub_city'); 
    }
    public function user(){
        return $this->belongsTo(user::class); 
    }
    
    public function purchase_invoice(){
        return $this->has(purchase_invoice::class); 
    }
    public function type_id(){
        return $this->belongsTo(option::class); 
    }
    public function supplier(){
        return $this->belongsTo(option::class); 
    }
    public function internal(){
        return $this->belongsTo(option::class); 
    }
}
