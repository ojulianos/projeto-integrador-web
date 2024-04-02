<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    protected $fillable = [
        'confirmed',
        'schedule_class_id',
        'student_id',
    ];

    public function student() {
        return $this->hasOne(Student::class);
    }

    public function schedule_class() {
        return $this->belongsTo(ScheduleClass::class);
    }
}
