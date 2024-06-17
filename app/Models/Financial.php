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
        'addition_value' ,
        'date_maturiry',
        'date_emission' ,
        'date_payment'
    ];
    
    protected $table = 'finances';

    // public function setAdditionValueAttribute($value)
    // {
    //     $this->attributes['addition_value'] = $value !== null ? $value : '50';
    // }

    // public function setDiscountValueAttribute($value)
    // {
    //     $this->attributes['discount_value'] = $value !== null ? $value : '100';
    // }

    public function getDateEmissionAttribute($value)
    {
        return $value ? date('Y-m-d', strtotime($value)) : '';
    }

    public function getDateMaturiryAttribute($value)
    {
        return $value ? date('Y-m-d', strtotime($value)) : '';
    }

    public function getDatePaymentAttribute($value)
    {
        return $value ? date('Y-m-d', strtotime($value)) : null;
    }    

    public function getTypeFinancialAttribute()
    {
        if ($this ->type == 'P'){
            return '<svg xmlns="http://www.w3.org/2000/svg" class="text-red-800" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>';
        }return'<svg xmlns="http://www.w3.org/2000/svg" class="text-green-800" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>';
    }
    
}



