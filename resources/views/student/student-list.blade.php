@extends('template')

@push('styles')

<link href="{{ asset('/css/student-list.css') }}" rel="stylesheet" type="text/css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
@endpush

@section('title', 'Student Management')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success')}}
</div>
@endif
<div class="add-button-box">
    <form class="form-inline my-2 my-lg-0 form-search" method="GET" action="{{ route('student.fetch') }}">
        @csrf
        @method('GET')
        <input class="form-control mr-sm-2 search-input" type="search" placeholder="Search ... " aria-label="Search" id='search' name='search'>
        <button class="btn btn-outline-success my-2 my-sm-0 btn-search" type="submit">Search</button>
    </form>
    <a href="{{ route('student.create') }}" class="btn btn-success btn-large btn-add">Add More</a>
    <a href="{{ route('chart') }}" class="btn btn-success btn-large btn-show-graph">Show Graph</a>
</div>

<div class="student-table">

    <table class="table  table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Họ và Tên</th>
                <th scope="col">MSSV</th>
                <th scope="col">Khoa</th>
                <th scope="col">Nghệ nghiệp mong muốn</th>
                <th scope="col"> </th>
            </tr>
        </thead>
        <tbody id='result'>
            @foreach($students as $student)
            <tr>
                <td scope="row"> {{ $student->hoten }}</td>
                <td scope="row"> {{ $student->mssv }}</td>
                <td scope="row"> {{ $student->khoas->tenkhoa }}</td>
                <td scope="row"> {{ $student->nghenghiep }}</td>
                <td class="btn-row">
                    <a href="{{ route('show', $student->id) }}" class="btn btn-success btn-edit">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route('edit', $student->id) }}" class="btn btn-primary btn-edit">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{ route('student.destroy', $student->id) }}" method="POST" style='display: contents;'>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-delete" type="submit">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div class="pagination ">
        {{ $students->links() }}
    </div>
</div>
@endsection
