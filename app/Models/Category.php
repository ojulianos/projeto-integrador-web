<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'age_max',
        'age_min',
    ];


    public function schedule_class()
    {
        return $this->hasMany(ScheduleClass::class);
    }
}
