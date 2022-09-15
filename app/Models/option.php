<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class option extends Model
{
    use HasFactory;
    public function purchase_invoice(){
        return $this->hasMany(invoice_parchase_entity::class); 
    }
}
