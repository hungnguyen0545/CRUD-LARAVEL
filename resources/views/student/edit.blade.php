@extends('main_template')


@push('styles')
<link href="{{ asset('css/form.css')}}" rel="stylesheet">
@endpush


@section('title', 'update student information')

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
    <h1> Fill your information </h1>
    <form class="form-fill" action="{{ route('students.update',$student->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name"> Họ và Tên </label>
            <input type="text" class="form-control name " name="hoten" placeholder="ex : Nguyễn Văn A" value="{{ $student->hoten }}">
        </div>
        <div class="form-group">
            <label for="mssv"> MSSV </label>
            <input type="text" class="form-control mssv" name="mssv" placeholder="ex : 17520545 " value="{{ $student->mssv }}">
        </div>
        <div class="form-group">
            <label for="tenkhoa"> Khoa </lßbel>
                <select name="khoa" class="form-control khoa" id="khoa">
                    <option value="1">Khoa Khoa học máy tính</option>
                    <option value="2">Khoa Hệ thống thông tin</option>
                    <option value="3">Khoa Công nghệ Phần mềm</option>
                    <option value="4">Khoa Kỹ thuật Máy tính</option>
                    <option value="5">Khoa MMT và Truyền thông</option>
                    <option value="6">Khoa Khoa học và Kỹ thuật Thông tin</option>
                </select>
                <input type="hidden" id="khoa_Id" value="{{ $student->khoa_id }}">
        </div>
        <div class="form-group">
            <label for="nghenghiep"> Nghề nghiệp mong muốn </label>
            <input type="text" class="form-control nghenghiep" name="nghenghiep" placeholder="ex : Software Enginering" value="{{ $student->nghenghiep }}">
        </div>
        <button type="submit" class="btn btn-primary submit"> Cập Nhật </button>
        <a href = " {{ route('students.index')}}" class="btn btn-secondary btn-return"> Trở về </a>
    </form>
</div>
@endsection

@section('script')
<script src="{{ asset('js/edit.js') }}"></script>
@endsection