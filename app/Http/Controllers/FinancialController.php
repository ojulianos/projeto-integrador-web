<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FinancialRequest;
use App\Models\Financial;

class FinancialController extends Controller
{
    private Financial $finances;

    public function __construct(Financial $finance){
        $this->finances = $finance;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dt_inicio = request('date_initial');
        $dt_fim = request('date_final');
        $finances = $this->finances;

        if (
            request('type') == 'R' || request('type') == 'P' 
        ){
            $finances = $finances->where ('type',request('type'));
        }

        if (!empty($dt_inicio)) {
            $finances = $finances->where('date_maturiry', '>=', $dt_inicio);
        }
    
        if (!empty($dt_fim)) {
            $finances = $finances->where('date_maturiry', '<=', $dt_fim);
        }


        $finances = $finances ->paginate(20);

        // dd(request());
        return view('pages.finances.list',[
            'finances' => $finances
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.finances.form',[
            'finance' => $this->finances,
            'form_action' => route('finance.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FinancialRequest $request)
    {
        if ($this->finances->create($request -> all())) {
            return response(['message' => 'Titulo cadastrado', 'status' => true]);
        }
        return response(['message' => 'Titulo não cadastrado', 'status' => false]);          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.finances.form', [
            'finance' => $this->finances->find($id),
            'form_action' => route('finance.store')
        ]);
    }
    
    public function pay($id)
    {
        return view('pages.finances.payment', [
            'finance' => $this->finances->find($id),
            'form_action' => route('finance.store')
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FinancialRequest $request, $id)
    {
        $finance = $this->finances->find($id);
        
        foreach ($request->except('_token') as $key => $value) {
            $finance->$key = $value;
        }

        if ($finance->save()) {
            return response(['message' => 'Título atualizado', 'status' => true]);
        }
        return response(['message' => 'Título não atualizado', 'status' => false]);
    }

    public function payPut(Request $request, $id)
    {
        $finance = $this->finances->find($id);
        
        $finance->date_payment = request('date_payment');

        if ($finance->save()) {
            return response(['message' => 'Título Pago', 'status' => true]);
        }
        return response(['message' => 'Título não Pago', 'status' => false]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $finance = $this->finances->find($id);

        if ($finance->delete()) {
            return response(['message' => 'Categoria excluída', 'status' => true]);
        }
        return response(['message' => 'Categoria não excluída', 'status' => false]);
    }
}
