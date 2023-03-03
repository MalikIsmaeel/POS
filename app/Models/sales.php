<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
    use HasFactory;
    protected $fillable=[
        'invoice_number',
        'invoice_date',
        'date_due',
        'total',
        'total_vat',
        
        'total_with_vat',
        'user_id'];
}
