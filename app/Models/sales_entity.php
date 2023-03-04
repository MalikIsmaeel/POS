<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\store_dtl;
class sales_entity extends Model
{
    use HasFactory;
    protected $fillable=[
                'qty',
                'cost', 
                'sub_total', 
                'active',
                 'invoice_id',
              'store_id', 
                  'product_id', 
               'unit_id',
               'user_id',
                   'tax',
    ];
    public function test(){
        return $this->belongsTo(store_dtl::class); 
    }
}
