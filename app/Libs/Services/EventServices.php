<?php

namespace App\Libs\Services;

use App\Events;
use Illuminate\Support\Facades\DB;
use Exception;

class EventServices {
    public static function SavedEvent($request, $event)
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
            return $e->getMessage();
        }
    }
    public static function ShowEntiredEvent()
    {
        try{
            return Events::all();
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }    
    }
    public static function CreatedNewEvent($request)
    {
        try{
            $event = new Events();
            EventServices::SavedEvent($request,$event);
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }
    public static function UpdatedEvent($request)
    {
        try{
            $event = Events::find($request->id);
            EventServices::SavedEvent($request,$event);
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }
    public static function DeletedEvent($request)
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
            return $e->getMessage();
        }
    }
}