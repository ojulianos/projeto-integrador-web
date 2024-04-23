<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Financial;
use App\Models\Student;
use App\Models\User;
use App\Models\Category;
use App\Models\Event;

class DashboardController extends Controller
{
    private Financial $finances;
    private Student $students;
    private User $users;
    private Category $categories;
    private Event $events;

    public function __construct(Student $student,Financial $finance,User $user, Category $category, Event $event)
    {
        $this->students = $student;
        $this->finances = $finance;
        $this->users = $user;
        $this->categories = $category;
        $this->events = $event;
    }
  
    public function index()
    {   
        $dt_inicio = date('Y-m-01');
        $dt_fim = date('Y-m-t');
        $ano_inicio = date('Y-01-01');
        $ano_fim = date('Y-12-t');
        
        $total_receber = $this->finances->where ('type','R')->whereBetween ('date_maturiry',[$dt_inicio,$dt_fim])->sum('value');
        $total_pagar = $this->finances->where ('type','P')->whereBetween ('date_maturiry',[$dt_inicio,$dt_fim])->sum('value');
        $total_receber_ano = $this->finances->where ('type','R')->whereBetween ('date_maturiry',[$ano_inicio,$ano_fim])->sum('value');
        $total_pagar_ano = $this->finances->where ('type','P')->whereBetween ('date_maturiry',[$ano_inicio,$ano_fim])->sum('value');
        $saldos = [
            'total_pagar'=>$total_pagar*-1,
            'total_receber'=>$total_receber,
            'saldo'=> $total_pagar*-1 + $total_receber,
            'total_pagar_ano'=>$total_pagar_ano*-1,
            'total_receber_ano'=>$total_receber_ano,
            'saldo_ano'=> $total_pagar_ano*-1 + $total_receber_ano
        ];
        $total_students = $this->students-> count('id');

        $total_user_teacher = $this-> users-> where('permission','P')->count('id');

        $total_category =  $this->categories-> count('id');

        $total_events = $this->events ->where('date_event','>',now())->count('id');
        
        return view('dashboard',[
                                'saldos' => $saldos,'total_students'=>$total_students,'total_user_teacher'=>$total_user_teacher,
                                'total_category' => $total_category,'total_events'=>$total_events
                    ]);
    }
}
