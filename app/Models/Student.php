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


    public function relatorioAlunosPresenca($dataIni, $dataFim)
    {
        return DB::select(
            "SELECT (SELECT concat(name, ' ', surname) FROM students WHERE students.id = presences.student_id) AS StudentName,
                    COUNT(*) AS PresenceCount,
                    DATE_FORMAT('{$dataIni}', '%d/%m/%Y') dataIni,
                    DATE_FORMAT('{$dataFim}', '%d/%m/%Y') dataFim
               FROM presences
              WHERE presence_date BETWEEN '{$dataIni}' AND '{$dataFim}'
              GROUP BY student_id"
        );
    }

}
