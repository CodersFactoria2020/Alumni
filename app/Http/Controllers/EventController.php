<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use App\Profile;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $this->authorize('haveaccess','event.index');
        $events=Event::all();
        return view ('event.index', compact('events'));
    }

    public function show(Event $event)
    {
        $this->authorize('haveaccess','event.show');
        $profiles=Profile::all();
        //dd($event);
        return view ('event.show', compact(['event', 'profiles']));
    }
    public function create()
    {
        $this->authorize('haveaccess','event.create');
        return view ('event.create');
    }
    public function store(Request $request)
    {
        $this->authorize('haveaccess','event.create');;
        $event=Event::create($request->all());
        return redirect()->route('event.index');
    }
    public function edit(Event $event)
    {
        $this->authorize('haveaccess','event.edit');
        return view ('event.edit',compact(['event']));
    }

    public function update(Event $event, Request $request)
    {
        $this->authorize('haveaccess','event.edit');
        $event->update($request->all());
        return redirect()->route('event.index');;
    }

    public function asist($event_id_pivote, $profile_id_pivote)
    {
        $this->authorize('haveaccess','event.asist');   
         
        $event = Event::find($event_id_pivote);
        $event->profiles()->attach($profile_id_pivote);

        //$profile = Profile::find($profile_id);
        //$profile->events()->attach($profile_id);

        return redirect()->route('event.index');
    }

    public function destroy(Event $event)
    {
        $this->authorize('haveaccess','event.destroy');
        $event->delete();
        return redirect()->route('event.index');
    }
}
