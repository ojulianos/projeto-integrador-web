<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    private Student $students;

    public function __construct(Student $student)
    {
        $this->students = $student;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.students.list', [
            'students' => $this->students->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.students.form', [
            'student' => $this->students,
            'form_action' => route('student.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $student = $request->all();
        $path = Storage::putFileAs(
            'avatars', $request->file('avatar'), $request->student()->id
        );

        if ($this->students->create($student)) {

            return response(['message' => 'Estudante cadastrado', 'status' => true]);
        }
        return response(['message' => 'Estudante não cadastrado', 'status' => false]);
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
        return view('pages.students.form', [
            'student' => $this->students->find($id),
            'form_action' => route('student.store')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StudentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        $student = $this->students->find($id);

        if ($student->save()) {
            return response(['message' => 'Estudante atualizado', 'status' => true]);
        }
        return response(['message' => 'Estudante não atualizado', 'status' => false]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = $this->students->find($id);

        if ($student->delete()) {
            return response(['message' => 'Estudante excluído', 'status' => true]);
        }
        return response(['message' => 'Estudante não excluído', 'status' => false]);
    }

    public function relatorio_aluno_Posicao(Request $request)
    {
        $alunos = [];
        $posicao = $request->posicao;

        if ($posicao){
            $alunos = (new Student())->relatorioAlunosPosicao($request->posicao);
        }        
        return view('relatorios.alunos_x_posicao', ['alunos' => $alunos, 'posicao' => $posicao]);
    }

    public function relatorio_aluno_Presenca(Request $request)
    {
        $alunosPresencas = [];
        $dataIni = $request->dataIni;
        $dataFim = $request->dataFim;
        if($dataIni and $dataFim){
            $alunosPresencas = (new Student())->relatorioAlunosPresenca($dataIni, $dataFim);
        }
        
                
        return view('relatorios.alunos_x_presenca', ['alunosPresencas' => $alunosPresencas]);
    }
}
