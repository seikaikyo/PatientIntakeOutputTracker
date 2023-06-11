<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>病人飲食與排出計量表</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>病人飲食與排出計量表</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                <form method="POST" action="/submit">
                    @csrf
                    <div class="mb-3">
                        <label for="dateTime" class="form-label">日期時間:</label>
                        <input type="datetime-local" id="dateTime" name="dateTime" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">類型:</label>
                        <select id="type" name="type" class="form-control">
                            <option value="攝入">攝入</option>
                            <option value="排出">排出</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">攝入/排出物內容:</label>
                        <input type="text" id="content" name="content" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="unit" class="form-label">數量:</label>
                        <input type="text" id="unit" name="unit" placeholder="cc/g/ml" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">送出</button>
                    <a href="/download-report" class="btn btn-secondary">下載報告</a>
                </form>
            </div>
            <div class="col-6">
                <form method="POST" action="/delete-all">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-3">清空所有紀錄</button>
                </form>
            </div>
        </div>
            </div>
        </div>


        <div class="row mt-5">
            <div class="col">
                <h3>攝入</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">日期時間</th>
                            <th scope="col">攝入物內容</th>
                            <th scope="col">數量</th>
                            <th scope="col">動作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inputRecords as $record)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($record->dateTime)->format('Y-m-d h:i A') }}</td>
                            {{-- <td>{{ $record->type }}</td> --}}
                            <td>{{ $record->content }}</td>
                            <td>{{ $record->unit }}</td>
                            <td>
                                <form method="POST" action="/delete/{{ $record->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">刪除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    <!-- 在攝入列表下方增加總計 -->
                    <tfoot>
                        <tr>
                            <td colspan="2">總攝入量：</td>
                            <td>{{ $totalInput }}</td>
                            <td>cc/g/ml</td>
                        </tr>
                    </tfoot>

                    </tbody>
                </table>
            </div>

            <div class="col">
                <h3>排出</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">日期時間</th>
                            <th scope="col">排出物內容</th>
                            <th scope="col">數量</th>
                            <th scope="col">動作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($outputRecords as $record)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($record->dateTime)->format('Y-m-d h:i A') }}</td>
                            {{-- <td>{{ $record->type }}</td> --}}
                            <td>{{ $record->content }}</td>
                            <td>{{ $record->unit }}</td>
                            <td>
                                <form method="POST" action="/delete/{{ $record->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">刪除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    <!-- 在排出列表下方增加總計 -->
                    <tfoot>
                        <tr>
                            <td colspan="2">總排出量：</td>
                            <td>{{ $totalOutput }}</td>
                            <td>cc/g/ml</td>
                        </tr>
                    </tfoot>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <canvas id="pieChart" width="200" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <script>
        // let ctxLine = document.getElementById('lineChart').getContext('2d');
        // let lineChart = new Chart(ctxLine, {
        //     type: 'line',
        //     data: {
        //         labels: @json($dateLabels),
        //         datasets: [{
        //             label: '攝入量',
        //             data: @json($totalInput),
        //             borderColor: 'rgba(75, 192, 192, 1)',
        //             fill: false,
        //         }, {
        //             label: '排出量',
        //             data: @json($totalOutput),
        //             borderColor: 'rgba(255, 99, 132, 1)',
        //             fill: false,
        //         }]
        //     }
        // });

        let ctxPie = document.getElementById('pieChart').getContext('2d');
        let pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['攝入', '排出'],
                datasets: [{
                    data: [@json($totalInputSum), @json($totalOutputSum)],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script>
<script>
    $(document).ready(function(){
        // Your existing chart generation code goes here...
    });
    </script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
