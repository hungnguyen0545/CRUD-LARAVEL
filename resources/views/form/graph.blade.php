@extends('template')

@section('title', 'Bar Chart')

@section('content')
<div class='chart' style='
display : flex ; 
flex-direction : column;
justify-content : center;
align-items : center;
'>
    <h2>Tổng số sinh viên trong danh sách là :
       {{$sum[0]->slsv}}
    </h2>
    <h2>Số lượng sinh viên của từng khoa : </h2>
    <div style='width : 900px !important ;'>
        <canvas id="barChart"></canvas>
    </div>

</div>

@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script>
    $(document).ready(function() {
        var array = '{{ json_encode($items) }}';
        array = JSON.parse(array);
        var ctxB = document.getElementById("barChart").getContext('2d');
        var myBarChart = new Chart(ctxB, {
            type: 'bar',
            data: {
                labels: ["KHMT", "HTTT", "CNPM", "KTMT", "MMT&TT", "KH&KTTT"],
                datasets: [{
                    label: '# of Votes',
                    data: array,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })
    });
</script>
@endsection