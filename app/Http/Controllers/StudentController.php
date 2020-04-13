<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = DB::table('sinhviens')
            ->join('khoas', 'sinhviens.khoa_id', '=', 'khoas.id')
            ->select('sinhviens.*', 'khoas.tenkhoa')
            ->paginate(5);
        return view('student.student-list', compact('students'));
    }
    public function chart()
    {
        $items = array();
        $array = DB::table('sinhviens')
                    ->rightJoin('khoas','sinhviens.khoa_id' ,'=', 'khoas.id')
                    ->selectRaw('khoas.id,coalesce(count(sinhviens.id),0) as slsv')
                    ->groupBy('khoas.id')
                    ->get();
        foreach($array as $key=>$value)
        {
            array_push($items, $value->slsv);
        }
        //array_push($items, $array);
        return view('form.graph', compact('items'));
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
            'hoten' => 'required|string',
            'mssv' => 'max:8|string|required|regex:(\d{2}52\d{4})',
            'khoa' => 'required',
            'nghenghiep' => 'required'
        ]);
        $student = new Student;

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
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $student = DB::table('sinhviens')
            ->join('khoas', 'sinhviens.khoa_id', '=', 'khoas.id')
            ->select('sinhviens.*', 'khoas.tenkhoa')
            ->whereRaw('sinhviens.id = ?', $id)
            ->first();
        return view('form.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = DB::table('sinhviens')
            ->join('khoas', 'sinhviens.khoa_id', '=', 'khoas.id')
            ->select('sinhviens.*')
            ->whereRaw('sinhviens.id = ?', $id)
            ->first();
        return view('form.edit', compact('student'));
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
            'hoten' => 'required|string',
            'mssv' => 'max:8|string|required|regex:(\d{2}52\d{4})',
            'khoa' => 'required',
            'nghenghiep' => 'required'
        ]);

        $student = Student::find($id);
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
