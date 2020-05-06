<?php

namespace App\Libs\Services;
use App\Students;
use Illuminate\Support\Facades\DB;
use Exception;

class StudentServices
{
    public static function ShowEntireStudent()
    {
        try{
            return Students::ShowStudent()->paginate(5);    
        }
        catch(Exception $e)
        {
            return $e->getMessage(); 
        }
    }
    public static function ShowEachStudent($id)
    {
        try{
            return Students::ShowStudent()
            ->whereRaw('sinhviens.id = ?', $id)
            ->first();
        }
        catch(Exception $e)
        {
            return $e->getMessage(); 
        }
    }
    public static function SavedStudent($request,$student)
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
            return $e->getMessage(); 
        }
    }
    public static function CreateNewStudent($request)
    {
        try{
            $student = new Students();
            StudentServices::SavedStudent($request,$student);
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }
    public static function UpdatedStudent($request,$id)
    {
        try{
            $student = Students::find($id);
            StudentServices::SavedStudent($request,$student);
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
        
    }
    public static function DeletedStudent($id)
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
            return $e->getMessage();
        }
    }
    public static function Fetch($query)
    {
        try{
            if ($query != '') {
                $students = Students::Fetch($query);
            } else {
                $students = Students::ShowStudent()->paginate(5);
            }
            return $students;
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }
    public static function CountFetch($query)
    {
        try{
            return Students::CountFetch($query);
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }
    public static function CountTotalStudent()
    {
        try{
            return Students::count();
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }
    public static function ShowChart()
    {
        try{
            $items = array();
            $array = Students::ShowChart();
            foreach ($array as $key => $value) 
            {
                array_push($items, $value->slsv);
            }
        return $items;
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
       
    }
    public static function ChangedCheckedStatusOfStudent($id,$hasChecked)
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
            return $e->getMessage();
        }
    }
}
