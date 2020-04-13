@extends('template')

@section('title', 'fill student information')
@push('styles')
<link href="{{ asset('css/form.css')}}" rel="stylesheet">
@endpush


@section('content')
<div class="box">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h1> Điền thông tin tại đây </h1>
    <form class="form-fill" action="{{ route('student.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name"> Họ và Tên </label>
            <input type="text" class="form-control name " name="hoten" placeholder="ex : Nguyễn Văn A"
            value="{{ old('hoten') }}">
        </div>
        <div class="form-group">
            <label for="mssv"> MSSV </label>
            <input type="text" class="form-control mssv" name="mssv" placeholder="ex : 17520545 "
            value="{{ old('mssv') }}">
        </div>
        <div class="form-group">
            <label for="tenkhoa"> Khoa </lßbel>
                <select name="khoa" class="form-control khoa">
                    <option value="1">Khoa Khoa học máy tính</option>
                    <option value="2">Khoa Hệ thống thông tin</option>
                    <option value="3">Khoa Công nghệ Phần mềm</option>
                    <option value="4">Khoa Kỹ thuật Máy tính</option>
                    <option value="5">Khoa MMT & Truyền thông</option>
                    <option value="6">Khoa Khoa học và Kỹ thuật Thông tin</option>
                </select>
        </div>
        <div class="form-group">
            <label for="nghenghiep"> Nghề nghiệp mong muốn </label>
            <input type="text" class="form-control nghenghiep" name="nghenghiep" placeholder="ex : Software Enginering"
            value="{{ old('nghenghiep') }}">
        </div>
        <button type="submit" class="btn btn-primary submit"> Gửi </button>
    </form>
</div>

@endsection