<?php

namespace App\Http\Controllers;

use App\Http\Requests\PresenceRequest;
use App\Models\Presence;
use App\Models\ScheduleClass;
use App\Models\Student;

class PresenceController extends Controller
{
    private Presence $presences;
    private ScheduleClass $classes;
    private Student $students;

    public function __construct(Presence $presence, ScheduleClass $schedule, Student $student)
    {
        $this->presences = $presence;
        $this->classes = $schedule;
        $this->students = $student;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presences = [];
        if (!empty(request('dataAula')) && !empty(request('aula'))) {
            $presences = $this->presences
                            ->getPresencesByDate(request('aula'), request('dataAula'));
        }
        
        return view('pages.presences.list', [
            'presences' => $presences,
            'classes' => $this->classes->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Requests\PresenceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PresenceRequest $request)
    {
        $schedule_class_id = request('schedule_class_id');
        $presence_date = request('created_at');
        $student_insert = [];
        $student_delete = [];

        foreach (request()->all() as $key => $value) {
            if (str_contains($key, 'confirmed') or str_contains($key, 'deleted')) {
                $item_data = explode('[', $key);
                $val_data = substr($item_data[1], 0, strlen($item_data[1]) - 1);
                
                if (str_contains($key, 'confirmed') and (mb_strtolower($value) == 'null' or is_null($value))) {
                    $student_insert[] = request("student_id[{$val_data}]");
                }

                if (str_contains($key, 'deleted') and (mb_strtolower($value) != 'null' or !is_null($value))) {
                    $student_delete[] = $value;
                }
            }
        }

        foreach ($student_insert as $student) {
            $presence = [
                'schedule_class_id' => $schedule_class_id,
                'presence_date' => $presence_date,
                'confirmed' => 'Y',
                'student_id' => $student,
            ];
            $this->presences->create($presence);
        }

        foreach ($student_delete as $student) {
            $this->presences->find($student)->delete();
        }

        return response(['message' => 'Presenças Cadastradas', 'status' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Requests\PresenceRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PresenceRequest $request, $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }
}
