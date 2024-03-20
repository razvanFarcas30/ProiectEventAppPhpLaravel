<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $evenimente = Event::orderBy('nume', 'ASC')->paginate(10);
        $value = ($request->input('page', 1) - 1) * 10;
        return view('evenimente.list', compact('evenimente'))->with('i', $value);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('evenimente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nume' => 'required',
            'descriere' => 'required',
            'data' => 'required',
            'locatie' => 'required',
            'ora_start' => 'required',
            'durata' => 'required'
        ]);

        Event::create($request->all());
        
        return redirect()->route('evenimente.index')->with('success', 'Your event added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $evenimente = Event::find($id);
        $tickets = $evenimente->tickets;
       
        $speakers = DB::table('evenimente_speaker')
            ->join('speakers', 'evenimente_speaker.speaker_id', '=', 'speakers.id')
            ->where('evenimente_speaker.evenimente_id', $id)
            ->select('speakers.*')
            ->get();

        
        return view('evenimente.show', compact('evenimente', 'tickets', 'speakers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $evenimente = Event::find($id);
        return view('evenimente.edit', compact('evenimente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nume' => 'required',
            'descriere' => 'required',
            'data' => 'required',
            'locatie' => 'required',
            'ora_start' => 'required',
            'durata' => 'required'
        ]);

        Event::find($id)->update($request->all());

        return redirect()->route('evenimente.index')->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Event::find($id)->delete();

        return redirect()->route('evenimente.index')->with('success', 'Event removed successfully');
    }
    
    public function agenda()
    {
        $events = Event::orderBy('data', 'ASC')->get();
        return view('evenimente.agenda', compact('events'));
    }
}
