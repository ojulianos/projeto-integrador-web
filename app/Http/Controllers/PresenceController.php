<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Models\Presence;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    private Presence $presences;

    public function __construct(Presence $presence)
    {
        $this->presences = $presence;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.presences.list', [
            'presences' => $this->presences->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.presences.form', [
            'presences' => $this->presences,
            'form_action' => route('presence.store')
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Requests\PresenceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PresenceRequest $request)
    {
        $presence = $request->all();

        if ($this->presences->create($presence)) {
            return response(['message' => 'Presença cadastrada', 'status' => true]);
        }
        return response(['message' => 'Presença não cadastrada', 'status' => false]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.presences.form', [
            'presence' => $this->presences->find($id),
            'form_action' => route('presence.store')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.presences.form', [
            'presence' => $this->presences->find($id),
            'form_action' => route('presence.store')
        ]);
        
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
        $presence = $this->presences->find($id);
        
        if ($presence->save()) {
            return response(['message' => 'Presença atualizada', 'status' => true]);
        }
        return response(['message' => 'Presença não atualizada', 'status' => false]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $presence = $this->presences->find($id);

        if ($presence->delete()) {
            return response(['message' => 'Presença excluída', 'status' => true]);
        }
    }
}
