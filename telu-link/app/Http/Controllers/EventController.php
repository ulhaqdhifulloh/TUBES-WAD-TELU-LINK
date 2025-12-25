<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();

        // Filter by category if provided
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $events = $query->orderBy('event_date', 'desc')->paginate(12);

        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:seminar,workshop,kompetisi,lainnya',
            'location' => 'required|string',
            'event_date' => 'required|date',
            'registration_deadline' => 'nullable|date',
            'organizer' => 'required|string',
            'contact_info' => 'nullable|string',
            'max_participants' => 'nullable|integer',
        ]);

        $validated['created_by'] = auth()->id();

        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:seminar,workshop,kompetisi,lainnya',
            'location' => 'required|string',
            'event_date' => 'required|date',
            'registration_deadline' => 'nullable|date',
            'organizer' => 'required|string',
            'contact_info' => 'nullable|string',
            'max_participants' => 'nullable|integer',
        ]);

        $event->update($validated);

        return redirect()->route('events.show', $event)->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }
}
