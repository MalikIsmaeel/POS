<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countery extends Model
{
    use HasFactory;
    protected $fillable =[
        'countery_name',
        'description',
        'active',
        'user_id',
        ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function countery(){
        return $this->hasmany(countery::class); 
    }
}
