<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'day_week',
        'category_id',
        'time_start',
        'time_end',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function hasDay($dayNumber) {
        $days = explode(',', $this->day_week);

        return in_array($dayNumber, $days) ? 'checked' : '';
    }
    
}
