<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index' , [
            'events' => $events
            ]
        );
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $event_name = $request->get('eventname');
        $event_budget = $request->get('budget');
        $event_detail = $request->get('detail');
        $event_size = $request->get('size');

        $event = new Event();
        $event->eventname = $event_name;
        $event->budget = $event_budget;
        $event->detail = $event_detail;
        $event->status = "PENDING";
        $event->size = $event_size;

        $event->save();
        return redirect()->route('events.index');
    }

}
