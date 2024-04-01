<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    private Event $events;

    public function __construct(Event $event)
    {
        $this->events = $event;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.events.list', [
            'events' => $this->events->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.events.form', [
            'events' => $this->events,
            'form_action' => route('event.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Requests\EventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $event = $request->all();

        if ($this->events->create($event)) {
            return response(['message' => 'Evento cadastrado', 'status' => true]);
        }
        return response(['message' => 'Evento não cadastrado', 'status' => false]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.events.form', [
            'event' => $this->events->find($id),
            'form_action' => route('event.store')
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
        return view('pages.events.form', [
            'event' => $this->eventss->find($id),
            'form_action' => route('event.store')
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Requests\EventRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id)
    {
        $event = $this->events->find($id);
        
        if ($event->save()) {
            return response(['message' => 'Evento atualizado', 'status' => true]);
        }
        return response(['message' => 'Evento não atualizado', 'status' => false]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = $this->events->find($id);

        if ($event->delete()) {
            return response(['message' => 'Evento excluído', 'status' => true]);
        }
    }
}
