<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Financial;

class DashboardController extends Controller
{
    private Financial $finances;

    public function __construct(Financial $finance){
        $this->finances = $finance;
    }

    public function index()
    {   
        $dt_inicio = date('Ym01');
        $dt_fim = date('Ymt');
        $total_receber = $this->finances->where ('type','R')->whereBetween ('date_maturiry',[$dt_inicio,$dt_fim])->sum('value');
        $total_pagar = $this->finances->where ('type','P')->whereBetween ('date_maturiry',[$dt_inicio,$dt_fim])->sum('value');
        $saldos = [
            'total_pagar'=>$total_pagar,
            'total_receber'=>$total_receber,
            'saldo'=> $total_pagar- $total_receber,
        ]
        ;
        return view('dashboard',['saldos' => $saldos]);
    }
}
