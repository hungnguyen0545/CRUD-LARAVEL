@extends('template')


@push('styles')
<link href="{{ asset('css/form.css')}}" rel="stylesheet">
@endpush
@section('title', 'fill student information')

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
                    <option value="Khoa Khoa học máy tính">Khoa Khoa học máy tính</option>
                    <option value="Khoa Hệ thống thông tin">Khoa Hệ thống thông tin</option>
                    <option value="Khoa Công nghệ Phần mềm">Khoa Công nghệ Phần mềm</option>
                    <option value="Khoa Kỹ thuật Máy tính">Khoa Kỹ thuật Máy tính</option>
                    <option value="Khoa MMT & Truyền thông">Khoa MMT & Truyền thông</option>
                    <option value="Khoa Khoa học và Kỹ thuật Thông tin">Khoa Khoa học và Kỹ thuật Thông tin</option>
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