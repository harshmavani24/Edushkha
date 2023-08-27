<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        $event = new Event;
        $academicPrograms = AcademicProgram::all();
        $campusLocations = CampusLocation::all();

        return view('events.create', compact('event', 'academicPrograms', 'campusLocations'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'event_date' => 'required|date',
            'format' => 'required|max:255',
            // add other fields if needed
        ]);

        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $academicPrograms = AcademicProgram::all();
        $campusLocations = CampusLocation::all();

        return view('events.edit', compact('event', 'academicPrograms', 'campusLocations'));
    }


    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'event_date' => 'required|date',
            'format' => 'required|max:255',
            // add other fields if needed
        ]);

        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
