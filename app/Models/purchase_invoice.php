<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchase_invoice extends Model
{
    use HasFactory;
    protected $fillable=[
    'invoice_number',
    'invoice_date',
    'date_due',
    'total',
    'total_vat',
    'supplier_id',
    'suppliers',
    'user_id'];
    public function supplier(){
        return $this->blong(supplier::class); 
    }
    public function invoice_parchase_entity(){
        return $this->hasMany(invoice_parchase_entity::class); 
    }
    
}
