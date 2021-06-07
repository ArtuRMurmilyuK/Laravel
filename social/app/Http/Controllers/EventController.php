<?php

namespace App\Http\Controllers;

use App\Event;
use App\Models\Particional;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' =>'required|max:50',
            'description' => 'required|max:255',
            'price' => 'required|max:50',
        ]);

        $event = Event::find($id);

        return redirect('/events')->with('success', 'Мероприятие добавлено!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);

        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);

        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' =>'required|max:50',
            'description' => 'required|max:255',
            'price' => 'required|max:50',
        ]);

        $event = Event::find($id);
        $event->title = $request->get('title');
        $event->description = $request->get('description');
        $event->price = $request->get('price');

        $event->save();

        return redirect('/events')->with('success', 'Пост успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect('/events')->with('success', 'Мероприятие удаленно!');
    }

    public function getParticional($eventId){
        $event = Event::find($eventId);

        if(Auth::user()->hasParticionalEvent($event)){
            return redirect()->back();
        }

        $event->particionals()->create(['user_id' => Auth::user()->id]);

        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $events
     * @return \Illuminate\Http\Response
     */
    public function entry($evenstId)
    {
        $events = Particional::find($evenstId);#1/2/33
        $users = User::all();

        
        
        return view('events.entry', ['events' => $events, 'users' => $users]);
    }
}
