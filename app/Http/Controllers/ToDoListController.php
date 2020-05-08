<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\Services\ToDoListServices;
use Exception;

class ToDoListController extends Controller
{
    public function index()
    {
        $listItems = ToDoListServices::showAllItems();
        return view('todolist.todolist',compact('listItems'));
    }
    public function complete($id)
    {
        try{
            ToDoListServices::completeItem($id);
            return redirect('/todolist')->with('success','Đã check thành công !!!');
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }
    public function store(Request $request)
    {
        try{
            ToDoListServices::createNewItem($request);
            return redirect('/todolist')->with('success','Đã thêm thành công !!!');
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    public function update(Request $request,$id)
    {
        try{
            ToDoListServices::updateItem($request,$id);
            return redirect('/todolist')->with('success','Đã sửa thành công !!!');
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    public function delete($id)
    {
        try{
            ToDoListServices::deleteItem($id);
            return redirect('/todolist')->with('success','Đã xoá thành công !!!');
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }
}
