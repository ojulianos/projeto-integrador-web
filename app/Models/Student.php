<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;

    public function relatorioAlunosPosicao($posicao)
    {
        return DB::select(
            "SELECT name, surname, '{$posicao}' as posicao  FROM students where position_1 = '{$posicao}' or position_2 = '{$posicao}'"
        );
    }
}
