<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\Services\EventServices;
use Exception;

class EventController extends Controller
{
    public function load()
    {
        try{
            $events = EventServices::showAllEvent();
            return response()->json($events);
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage()); 
        }
    }

    public function store(Request $request)
    {
        try{
            EventServices::createNewEvent($request);
            return response()->json(true);
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage()); 
        }
    }
    
    public function update(Request $request)
    {
        try{
            EventServices::updateEvent($request);
            return response()->json(true);
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage()); 
        }
    }

    public function delete(Request $request)
    {
        try{
            EventServices::deleteEvent($request);
            return response()->json(true);
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage()); 
        }
    }
}
