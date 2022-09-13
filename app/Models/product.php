<?php

namespace App\Models;
use App\Models\catogery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;
class product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name' ,
    'active',
     
     'photo',
     'user_id',

     'catogery_id'
];
    public function user()
    {
        
        return $this->belongsTo(User::class);
    }
    public function catogery(){
        return $this->belongsTo(catogery::class); 
    }
    public function store_dtl(){
        return $this->hasmany(store_dtl::class); 
    }
   

}
