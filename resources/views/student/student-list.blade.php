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
    <form class="form-inline my-2 my-lg-0 form-search">
        <input class="form-control mr-sm-2 search-input" type="search" placeholder="Search ... " aria-label="Search" id='search'>
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
        </tbody>
    </table>

</div>
@endsection

@section('script')
<script>
    $(document).ready(function()
    {
        load();
        function load(query = '')
        {
            $.ajaxSetup({ headers: { 'csrftoken' : '{{csrf_token()}}' } });
            $.ajax({
                url : "{{ route('student.fetch') }}",
                method : 'GET',
                data : {query : query},
                success : function(data)
                {
                    $('#result').html(data);
                    
                }
            })
        }
        $('#search').on('keyup',function()
        {
            var query = $(this).val();
            load(query);
        })
    })
</script>
@endsection 