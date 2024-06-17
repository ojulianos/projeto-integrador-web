<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Presence extends Model
{
    use HasFactory;

    protected $fillable = [
        'confirmed',
        'schedule_class_id',
        'student_id',
        'presence_date',
    ];

    public function student() {
        return $this->hasOne(Student::class);
    }

    public function schedule_class() {
        return $this->belongsTo(ScheduleClass::class);
    }

    public function getPresencesByDate($schedule, $date)
    {
        $query = "SELECT concat(s.name, ' ', s.surname) AS name, s.id AS student_id
                    , p.confirmed, p.id AS presence_id
                FROM schedule_classes sc 
                INNER JOIN categories c ON (
                    c.id = sc.category_id 
                )
                INNER JOIN students s ON (
                    TIMESTAMPDIFF(YEAR, s.birth_date , CURDATE()) BETWEEN c.age_min AND c.age_max 
                )
                LEFT JOIN presences p ON (
                    p.schedule_class_id = sc.id AND p.student_id = s.id AND p.presence_date = '{$date}'
                )
                WHERE sc.id = ?
                    AND FIND_IN_SET(DAYOFWEEK('{$date}')-1, sc.day_week) > 0
                ORDER BY name, surname";
        
        return DB::select(
            $query, [$schedule]
        );
    }
}
