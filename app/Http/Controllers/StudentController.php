<?php

namespace App\Http\Controllers;

use App\Sinhviens;
use App\Checkstar;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentInfo;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $students = Sinhviens::ShowStudent()->paginate(5);
        return view('student.student-list', compact('students'));
    }


     /**
     * Show research want to search .
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fetch(Request $request)
    {
        $query = $request->get('search');
        if ($query != '') {
            $students = Sinhviens::Fetch($query);
        } else {
            $students = Sinhviens::ShowStudent()->paginate(5);
        }
        $countFetch = Sinhviens::CountFetch($query);
        return view('student.student-list', compact('students', 'query', 'countFetch'));
    }

     /**
     * Display a chart which show number of student each khoa.
     *
     * @return \Illuminate\Http\Response
     */
    public function chart()
    {
        $items = array();
        $array = Sinhviens::ShowChart();
        $total = Sinhviens::count();
        foreach ($array as $key => $value) {
            array_push($items, $value->slsv);
        }
        return view('form.graph', compact('items', 'total'));
    }

    /**
     * Show research want to search .
     * 
     * @param  \Illuminate\Http\Request  $request 
     * @param id of student 
     * @return \Illuminate\Http\Response
     */
    public function checkStar(Request $request,$id)
    {
         $student_has_choosed = Sinhviens::CheckStar($id);
         $oldStudent = $request->session()->has('check') ? $request->session()->get('check') : null;
       
         $check = new Checkstar($oldStudent);
         $check->add($student_has_choosed->id,$student_has_choosed);

         $request->session()->put('check',$check);
        return redirect('/')->with('success', 'Đã check thành công !!!');    
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
    public function store(StoreStudentInfo $request)
    {

        $student = new sinhviens;
        $student->hoten =  $request->get('hoten');
        $student->mssv = $request->get('mssv');
        $student->khoa_id = $request->get('khoa');
        $student->nghenghiep = $request->get('nghenghiep');
        $student->save();

        return redirect('/')->with('success', 'Đã thêm thành công !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sinhviens  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Sinhviens::ShowStudent()
            ->whereRaw('sinhviens.id = ?', $id)
            ->first();

        return view('form.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sinhviens  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Sinhviens::ShowStudent()
            ->whereRaw('sinhviens.id = ?', $id)
            ->first();;
        return view('form.edit', compact('student'));
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

        $student = Sinhviens::find($id);
        $student->hoten =  $request->get('hoten');
        $student->mssv = $request->get('mssv');
        $student->khoa_id = $request->get('khoa');
        $student->nghenghiep = $request->get('nghenghiep');
        $student->save();

        return redirect('/')->with('success', 'Đã cập nhật thành công!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sinhviens  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Sinhviens::find($id);
        $student->delete();
        return redirect('/')->with('success', 'Xoá thành công !');
    }

}
