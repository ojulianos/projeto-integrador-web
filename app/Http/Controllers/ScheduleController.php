<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Models\ScheduleClass;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    private ScheduleClass $schedules;

    public function __construct(ScheduleClass $schedule)
    {
        $this->schedules = $schedule;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.schedules.list', [
            'schedules' => $this->schedules->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.schedules.form', [
            'schedules' => $this->schedules,
            'form_action' => route('schedule.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Requests\ScheduleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleRequest $request)
    {
        $schedule = $request->all();

        if ($this->schedules->create($schedule)) {
            return response(['message' => 'Agenda cadastrada', 'status' => true]);
        }
        return response(['message' => 'Agenda não cadastrada', 'status' => false]);
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
        return view('pages.schedules.form', [
            'schedule' => $this->schedules->find($id),
            'form_action' => route('schedule.store')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Requests\ScheduleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleRequest $request, $id)
    {
        $schedule = $this->schedules->find($id);
        
        if ($schedule->save()) {
            return response(['message' => 'Agenda atualizada', 'status' => true]);
        }
        return response(['message' => 'Agenda não atualizada', 'status' => false]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = $this->schedules->find($id);

        if ($schedule->delete()) {
            return response(['message' => 'Agenda excluída', 'status' => true]);
        }
    }
}
