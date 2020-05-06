@extends('main_template')

@section('title', 'Bar Chart')

@push('styles')
<link href="{{ asset('css/form.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class='chart'>
    <h2>Tổng số sinh viên trong danh sách : {{ $total }}</h2>
    <h2>Số lượng sinh viên của từng khoa : </h2>
    <div style='width : 900px !important ;'>
        <canvas id="barChart"></canvas>
        <input type='hidden' id='array' value="@json($items)">
    </div>
</div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="{{ asset('js/graph.js')}}"></script>
@endsection