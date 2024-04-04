<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Models\ScheduleClass;
use App\Models\Category;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    private ScheduleClass $schedules;
    private $dias_semana;

    public function __construct(ScheduleClass $schedule)
    {
        $this->schedules = $schedule;
        $this->dias_semana = [
            ['numero' => 0, 'dia' => 'Segunda-Feira'],
            ['numero' => 1, 'dia' => 'Terça-Feira'],
            ['numero' => 2, 'dia' => 'Quarta-Feira'],
            ['numero' => 3, 'dia' => 'Quinta-Feira'],
            ['numero' => 4, 'dia' => 'Sexta-Feira'],
            ['numero' => 5, 'dia' => 'Sábado'],
            ['numero' => 6, 'dia' => 'Domingo'],
        ];
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
            'schedule' => $this->schedules,
            'categories' => Category::all(),
            'dias_semana' => $this->dias_semana,
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
        $schedule = $request->except('_token', 'day_week[0]', 'day_week[1]', 'day_week[2]', 'day_week[3]', 'day_week[4]', 'day_week[5]', 'day_week[6]');
        $days_week = request()->only('day_week[0]', 'day_week[1]', 'day_week[2]', 'day_week[3]', 'day_week[4]', 'day_week[5]', 'day_week[6]');
        $day_week = implode(',', $days_week);
        $schedule['day_week'] = $day_week;

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
            'categories' => Category::all(),
            'dias_semana' => $this->dias_semana,
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

        foreach ($request->except('_token', 'day_week[0]', 'day_week[1]', 'day_week[2]', 'day_week[3]', 'day_week[4]', 'day_week[5]', 'day_week[6]') as $key => $value) {
            $schedule->$key = $value;
        }

        $days_week = request()->only('day_week[0]', 'day_week[1]', 'day_week[2]', 'day_week[3]', 'day_week[4]', 'day_week[5]', 'day_week[6]');
        $day_week = implode(',', $days_week);
        $schedule['day_week'] = $day_week;

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
