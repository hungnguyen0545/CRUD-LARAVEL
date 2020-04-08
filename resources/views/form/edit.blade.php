@extends('template')


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
    <form class="form-fill" action="{{ route('student.update',$student) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name"> Họ và Tên </label>
            <input type="text" class="form-control name " name="hoten" placeholder="ex : Nguyễn Văn A" value="{{ $student->name }}">
        </div>
        <div class="form-group">
            <label for="mssv"> MSSV </label>
            <input type="text" class="form-control mssv" name="mssv" placeholder="ex : 17520545 " value="{{ $student->mssv }}">
        </div>
        <div class="form-group">
            <label for="tenkhoa"> Khoa </lßbel>
                <select name="khoa" class="form-control khoa" id="khoa">
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
            <input type="text" class="form-control nghenghiep" name="nghenghiep" placeholder="ex : Software Enginering" value="{{ $student->nghenghiep }}">
        </div>
        <button type="submit" class="btn btn-primary submit"> Cập Nhật </button>
    </form>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        const khoaOldValue = '{{ $student->khoa}}';

        if (khoaOldValue !== '') {
            $('#khoa').val(khoaOldValue);
        }
    });
</script>
@endsection