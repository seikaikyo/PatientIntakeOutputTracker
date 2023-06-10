<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>病人飲食與排出計量表</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">病人飲食與排出計量表</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">日期時間</th>
                    <th scope="col">類型</th>
                    <th scope="col">攝入/排出物內容</th>
                    <th scope="col">單位</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($record->dateTime)->format('Y-m-d H:i:s') }}</td>
                        {{-- <td>{{ $record->formatted_date_time }}</td> --}}
                        <td>{{ $record->type }}</td>
                        <td>{{ $record->content }}</td>
                        <td>{{ $record->unit }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
