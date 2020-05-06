<?php

namespace App\Http\Controllers;

use App\Libs\Services\StudentServices;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentInfo;
use Exception;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        try{
            $students = StudentServices::ShowEntireStudent();
            return view('student.student-list', compact('students'));
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
        
    }

     /**
     * Show research want to search .
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fetch(Request $request)
    {
        try{
            $query      = $request->get('search');
            $students   = StudentServices::Fetch($query);
            $countFetch = StudentServices::CountFetch(($query));
            return view('student.student-list', compact('students', 'query', 'countFetch'));
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }

     /**
     * Display a chart which show number of student each khoa.
     *
     * @return \Illuminate\Http\Response
     */
    public function chart()
    {
        try{
            $total = StudentServices::CountTotalStudent();
            $items = StudentServices::ShowChart();
            return view('student.graph', compact('items', 'total'));
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }   
    }

    /**
     * Show research want to search .
     * 
     * @param  \Illuminate\Http\Request  $request 
     * @param id of student 
     * @return \Illuminate\Http\Response
     */
    public function checkStar(Request $request)
    {
        try{
            $id = $request->id;
            $hasChecked = $request->hasChecked;
            StudentServices::ChangedCheckedStatusOfStudent($id,$hasChecked);
            return response()->json(array('mess' => 'success'));
        }
        catch(Exception $e)
        {
            $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    
    {
        return view('student.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentInfo $request)
    {
        try{
            StudentServices::CreateNewStudent($request);
            return redirect('/')->with('success', 'Đã thêm thành công !!!');
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sinhviens  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            $student = StudentServices::ShowEachStudent($id);
            return view('student.show', compact('student'));
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sinhviens  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $student = StudentServices::ShowEachStudent($id);
            return view('student.edit', compact('student'));
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sinhviens  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStudentInfo $request, $id)
    {
        try{
            StudentServices::UpdatedStudent($request, $id);
            return redirect('/')->with('success', 'Đã cập nhật thành công!!!');
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sinhviens  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            StudentServices::DeletedStudent($id);
            return redirect('/')->with('success', 'Xoá thành công !');
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }
}
