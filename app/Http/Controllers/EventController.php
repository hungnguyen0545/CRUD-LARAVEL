<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;


class EventController extends Controller
{
    public function loadEvents()
    {
        $events = Events::all();
        return response()->json($events);
    }

    public function StoreEvents(Request $request)
    {
        $event = new Events();
        $event->title = $request->title;
        $event->start = $request->start;
        $event->end   = $request->end;
        $event->color = $request->color;
        $event->description = $request->description;

        $event->save();

        return response()->json(true);
    }
    
    public function UpdateEvents(Request $request)
    {
        $event = Events::find($request->id);
        $event->title = $request->title;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->color = $request->color;
        $event->description = $request->description;
        $event->save();

        return response()->json(true);
    }

    public function DeleteEvents(Request $request)
    {
        $event = Events::find($request->id);
        $event->delete();
        return response()->json(true);
    }

   
}
