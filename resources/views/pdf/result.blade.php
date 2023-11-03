<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif, 'poppins';
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #1904d6;
            color: white;
        }

        #customers td {
            font-size: 12px;
        }

        h1 {
            font-size: 20px;
        }

        #count {
            text-align: center;
        }

        #result {
            text-align: center;
            font-weight: 600;
        }

        #totalcount {
            text-align: center;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <h1>Overall Services Surveyed
        by the
        University</h1>

    <table id="customers">
        <tr>
            <th>Overall Services</th>
            <th>Responses</th>
            {{-- <th>Total of Transaction</th> --}}
        </tr>
        @foreach ($getTotalPerService as $serviceTitle => $count)
            <tr>
                <td> {{ $serviceTitle }}</td>
                <td id="count">{{ $count }}</td>
                {{-- <td>{{ $count }}</td> --}}
            </tr>
        @endforeach
        <tr>
            <td id="result">
                TOTAL RESULT
            </td>
            <td id="totalcount">
                {{ $getTotalNumberPerService }}
            </td>
        </tr>
    </table>

</body>

</html>
