<?php

namespace App\Libs\Services;
use App\Students;
use Illuminate\Support\Facades\DB;
use Exception;

class StudentServices
{
    public static function showAllStudent()
    {
        try{
            return Students::showStudent()->paginate(5);    
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage()); 
        }
    }
    public static function showEachStudent($id)
    {
        try{
            return Students::showStudent()
            ->whereRaw('sinhviens.id = ?', $id)
            ->first();
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage()); 
        }
    }
    public static function save($request,$student)
    {
        DB::beginTransaction();
        try{
            $student->hoten =  $request->get('hoten');
            $student->mssv = $request->get('mssv');
            $student->khoa_id = $request->get('khoa');
            $student->nghenghiep = $request->get('nghenghiep');
            $student->save();
            DB::commit();
        }
        catch(Exception $e)
        {
            DB::rollBack();
            throw new Exception($e->getMessage()); 
        }
    }
    public static function createNewStudent($request)
    {
        try{
            $student = new Students();
            StudentServices::save($request,$student);
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage()); 
        }
    }
    public static function updateStudent($request,$id)
    {
        try{
            $student = Students::find($id);
            StudentServices::save($request,$student);
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage()); 
        }
        
    }
    public static function deleteStudent($id)
    {
        DB::beginTransaction();
        try{
            $student = Students::find($id);
            $student->delete();
            DB::commit();
        }
        catch(Exception $e)
        {
            DB::rollBack();
            throw new Exception($e->getMessage()); 
        }
    }
    public static function fetch($query)
    {
        try{
            if ($query != '') {
                $students = Students::fetch($query);
            } else {
                $students = Students::showStudent()->paginate(5);
            }
            return $students;
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage()); 
        }
    }
    public static function countFetch($query)
    {
        try{
            return Students::countFetch($query);
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage()); 
        }
    }
    public static function countTotalStudent()
    {
        try{
            return Students::count();
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage()); 
        }
    }
    public static function showChart()
    {
        try{
            $items = array();
            $array = Students::showChart();
            foreach ($array as $key => $value) 
            {
                array_push($items, $value->slsv);
            }
        return $items;
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage()); 
        }
       
    }
    public static function changedCheckedStatusOfStudent($id,$hasChecked)
    {
        DB::beginTransaction();
        try{
            $student =  Students::find($id);
            if($hasChecked == 'false')
            {
                $student->check = 0;
            }
        
            else if ($hasChecked == 'true')
            {
                $student->check = 1; 
            }
            $student->save();
            DB::commit();
        }
        catch(Exception $e)
        {
            DB::rollBack();
            throw new Exception($e->getMessage()); 
        }
    }
}
