<?php

namespace App\Libs\Services;

use App\Events;
use Illuminate\Support\Facades\DB;
use Exception;

class EventServices {
    public static function saveEvent($request, $event)
    {
        DB::beginTransaction();
        try{
            $event->title = $request->title;
            $event->start = $request->start;
            $event->end   = $request->end;
            $event->color = $request->color;
            $event->description = $request->description;
            $event->save();
            DB::commit();
        }
        catch(Exception $e)
        {
            DB::rollBack();
            throw new Exception($e->getMessage()); 
        }
    }
    public static function showAllEvent()
    {
        try{
            return Events::all();
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage()); 
        }    
    }
    public static function createNewEvent($request)
    {
        try{
            $event = new Events();
            EventServices::saveEvent($request,$event);
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage()); 
        }
    }
    public static function updateEvent($request)
    {
        try{
            $event = Events::find($request->id);
            EventServices::saveEvent($request,$event);
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage()); 
        }
    }
    public static function deleteEvent($request)
    {
        DB::beginTransaction();
        try{
            $event = Events::find($request->id);
            $event->delete();
            DB::commit();
        }
        catch(Exception $e)
        {
            DB::rollBack();
            throw new Exception($e->getMessage()); 
        }
    }
}