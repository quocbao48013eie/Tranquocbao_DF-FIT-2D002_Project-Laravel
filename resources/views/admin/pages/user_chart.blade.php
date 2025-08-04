@extends('admin.layout.master')

@section('content')
    <div class="container mt-5">
        <h3 class="text-center">Thống kê số lượng người dùng</h3>
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
                ['Người dùng', 'Số lượng tài khoản'],
                @foreach ($monthlyJobs as $month => $jobs)
                    ['Tháng {{ $month }}', {{ $jobs }}],
                @endforeach

            ]);

            const options = {
                title: 'Số lượng tài khoản đã đăng ký',
                chartArea: {
                    width: '50%'
                },
                bar: { groupWidth: '60%' },
                hAxis: {
                    title: 'Số lượng tài khoản',
                    minValue: 0,
                    slantedText: true,
                    slantedTextAngle: 45
                },
                vAxis: {
                    title: 'Người dùng'
                }
            };

            const chart = new google.visualization.ColumnChart(document.getElementById('jobChart'));
            chart.draw(data, options);
        }
    </script>
@endsection
