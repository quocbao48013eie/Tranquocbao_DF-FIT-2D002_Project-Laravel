@extends('admin.layout.master')

@section('content')
    <div class="container mt-5">
        <h3 class="text-center">Thống kê số lượng công việc</h3>
        <div id="jobChart" style="width: 100%; height: 500px;"></div>
    </div>
@endsection

@section('my-js')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            const data = google.visualization.arrayToDataTable([
                ['Nhà tuyển dụng', 'Số lượng công việc'],
                @foreach ($monthlyJobs as $month => $jobs)
                    ['Tháng {{ $month }}', {{ $jobs }}],
                @endforeach

            ]);

            const options = {
                title: 'Số lượng công việc đã đăng',
                chartArea: {
                    width: '50%'
                },
                bar: {
                    groupWidth: '60%'
                },
                hAxis: {
                    title: 'Số lượng công việc',
                    minValue: 0,
                    slantedText: true,
                    slantedTextAngle: 45
                },
                vAxis: {
                    title: 'Nhà tuyển dụng'
                }
            };

            const chart = new google.visualization.ColumnChart(document.getElementById('jobChart'));
            chart.draw(data, options);
        }
    </script>
@endsection
