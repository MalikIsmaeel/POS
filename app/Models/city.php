<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;
    protected $fillable =[
        'city_name',
        'description',
        'active',
        'user_id',
        'countery_id'];
        public function countery(){
            return $this->belongsTo(countery::class); 
        }
        public function user(){
            return $this->belongsTo(user::class); 
        }
        public function sub_city(){
            return $this->hasmany(city::class); 
        }

}
