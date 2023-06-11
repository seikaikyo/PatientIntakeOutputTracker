<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>病人飲食與排出計量表 - PDF 報告</title>
    <style>
        body {
            font-family: 'NotoSerifTC-Regular';
        }
        .content {
            font-size: 10px;
        }
        .title {
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h2>病人飲食與排出計量表 - PDF 報告</h2>

    <h3>攝入</h3>
    <table>
        <thead>
            <tr>
                <th>日期時間</th>
                <th>攝入物內容</th>
                <th>數量</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inputRecords as $record)
            <tr>
                <td>{{ \Carbon\Carbon::parse($record->dateTime)->format('Y-m-d h:i A') }}</td>
                <td>{{ $record->content }}</td>
                <td>{{ $record->unit }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">總攝入量：</td>
                <td>{{ $totalInput }}</td>
            </tr>
        </tfoot>
    </table>

    <h3>排出</h3>
    <table>
        <thead>
            <tr>
                <th>日期時間</th>
                <th>排出物內容</th>
                <th>數量</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($outputRecords as $record)
            <tr>
                <td>{{ \Carbon\Carbon::parse($record->dateTime)->format('Y-m-d h:i A') }}</td>
                <td>{{ $record->content }}</td>
                <td>{{ $record->unit }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">總排出量：</td>
                <td>{{ $totalOutput }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
