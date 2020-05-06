<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\Services\EventServices;
use Exception;

class EventController extends Controller
{
    public function loadEvents()
    {
        try{
            $events = EventServices::ShowEntiredEvent();
            return response()->json($events);
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function StoreEvents(Request $request)
    {
        try{
            EventServices::CreatedNewEvent($request);
            return response()->json(true);
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }
    
    public function UpdateEvents(Request $request)
    {
        try{
            EventServices::UpdatedEvent($request);
            return response()->json(true);
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function DeleteEvents(Request $request)
    {
        try{
            EventServices::DeletedEvent($request);
            return response()->json(true);
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }
}
