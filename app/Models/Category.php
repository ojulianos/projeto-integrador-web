<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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


    public function relatorioAlunos($min, $max, $categoria)
    {
        return DB::select(
            "SELECT name, '{$categoria}' as categoria FROM students WHERE TIMESTAMPDIFF(YEAR, birth_date , CURDATE()) BETWEEN ? AND ? "
            , [$min, $max]
        );
    }
}
