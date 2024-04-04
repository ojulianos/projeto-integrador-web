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

    private $dias_semana = [
        0 => 'Segunda',
        1 => 'Terça',
        2 => 'Quarta',
        3 => 'Quinta',
        4 => 'Sexta',
        5 => 'Sábado',
        6 => 'Domingo',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function hasDay($dayNumber) {
        $days = explode(',', $this->day_week);

        return in_array($dayNumber, $days) ? 'checked' : '';
    }

    public function hasDays() {
        $days = explode(',', $this->day_week);
        $labels = '';

        foreach($days as $day){
            if (array_key_exists($day, $this->dias_semana)){
               $labels .= '<span class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">'. $this->dias_semana[$day] .'</span>';
            }
        }

        return $labels;
    }
    
}
