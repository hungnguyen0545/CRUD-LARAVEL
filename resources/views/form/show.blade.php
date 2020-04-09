@extends('template')


@push('styles')
<link href="{{ asset('css/form.css')}}" rel="stylesheet">
@endpush


@section('title', 'show student information')

@section('content')
<div class="card info-card">
    <h3 class="card-header"> Họ và Tên : {{ $student->name }}</h3>
    <div class="card-body">
        <p class="card-title"> Thông tin sinh viên : </p>
        <div class="card-text">
            <p> mssv : {{ $student->mssv}}</p>
            <p> Khoa : {{ $student->khoa}}</p>
            <p> Nghề nghiệp mong muốn : {{ $student->nghenghiep}}</p>
        </div>
    </div>
</div>
@endsection