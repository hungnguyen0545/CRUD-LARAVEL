<?php 

namespace App\Libs\Services;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\ToDoList;
use Exception;

class ToDoListServices {

    public static function showAllItems()
    {
        try{
            return ToDoList::select('id','content','completed')
                            ->where('user_id',Auth::id())
                            ->get();
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    public static function completeItem($id)
    {
        DB::beginTransaction();
        try{
            ToDoList::find($id)
            ->update(
                    [
                        'completed' => 1
                    ]);
                DB::commit();
        }
        catch(Exception $e)
        {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }
    public static function save($request, $item)
    {
        DB::beginTransaction();
        try{
            $item->content = $request->content;
            $item->user_id = Auth::id();
            $item->completed = 0;
            $item->save();
            DB::commit();
        }
        catch(Exception $e)
        {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
        
    }

    public static function createNewItem($request)
    {
        try{
            $newItem = new ToDoList();
            ToDoListServices::save($request,$newItem);
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    public static function updateItem($request,$id)
    {
        try{
            $item = ToDoList::find($id);
            ToDoListServices::save($request,$item);
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteItem($id)
    {
        DB::beginTransaction();
       try{
           $item = ToDoList::find($id);
           $item->delete();
           DB::commit();
       }
       catch(Exception $e)
       {
            DB::rollback();
            throw new Exception($e->getMessage());
       }
    }

}