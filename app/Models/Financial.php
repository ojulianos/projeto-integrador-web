<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    use HasFactory;

    protected $fillable = [
        'type' ,
        'description',
        'value',
        'discount_value',
        'addtional_value' ,
        'date_maturiry',
        'date_emission' ,
        'date_payment', 
    ];
    
    protected $table = 'finances';
}

