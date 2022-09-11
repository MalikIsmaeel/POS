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
}
