<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store_mstr extends Model
{
    use HasFactory;
    protected $fillable =[
        'storecode',
       'sub_city_id',
       'user_id'];
       public function subcity(){
           return $this->belongsTo(sub_city::class); 
       }
       public function user(){
           return $this->belongsTo(user::class); 
       }
}
