<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Validator;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('student.student-list',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'hoten' => 'required',
            'mssv' => 'required',
            'khoa' => 'required',
            'nghenghiep' => 'required'
        ]);
        $student = new Student;
        
        $student->name =  $request->get('hoten');
        $student->mssv = $request->get('mssv');
        $student->khoa = $request->get('khoa');
        $student->nghenghiep = $request->get('nghenghiep');
        

        $student->save();
        return redirect('/')->with('success', 'Đã thêm thành công !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('form.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'hoten' => 'required',
            'mssv' => 'required',
            'khoa' => 'required',
            'nghenghiep' => 'required'
        ]);

        $student = Student::find($id);
        $student->name =  $request->get('hoten');
        $student->mssv = $request->get('mssv');
        $student->khoa = $request->get('khoa');
        $student->nghenghiep = $request->get('nghenghiep');
        $student->save();

        return redirect('/')->with('success', 'Đã cập nhật thành công!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect('/')->with('success', 'Xoá thành công !');
    }
}
