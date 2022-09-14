<?php

namespace App\Models;
use App\Models\supplier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_city extends Model
{
    use HasFactory;
    protected $fillable =[
        'sub_cities_name',
        'description',
        'active',
        'user_id',
        'city_id'];
        public function city(){
            return $this->belongsTo(city::class); 
        }
        public function user(){
            return $this->belongsTo(user::class); 
        }
        public function storemstr(){
            return $this->hasmany(store_mstr::class); 
        }
        public function supplier(){
            return $this->has(supplier::class,'sub_city'); 
        }
}
