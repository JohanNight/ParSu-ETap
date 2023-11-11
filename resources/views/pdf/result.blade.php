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
            padding: 4px;
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
    @foreach ($offices as $office)
        @if ($office->idOffices == $userOffice)
            <h1>Services Surveyed
                by the
                {{ $office->officeDescription }}</h1>
        @endif
    @endforeach


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
    {{-- Citizen Charter --}}
    <div>

        <table id="customers" class="CSMcc">
            <tr>
                <th>CSM Report</th>
                <th>Response</th>
            </tr>

            @foreach ($cc1Report as $ccOption => $count)
                <tr>
                    <td>
                        {{ $ccOption }}
                    </td>
                    <td>
                        {{ $count }}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td>

                </td>
                <td>

                </td>
            </tr>
            @foreach ($cc2Report as $ccOption => $count)
                <tr>
                    <td>
                        {{ $ccOption }}
                    </td>
                    <td>
                        {{ $count }}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td>

                </td>
                <td>

                </td>
            </tr>
            @foreach ($cc3Report as $ccOption => $count)
                <tr>
                    <td>
                        {{ $ccOption }}
                    </td>
                    <td>
                        {{ $count }}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td>
                    Total Response
                </td>
                <td>
                    {{ $totalResponses }}
                </td>
            </tr>
        </table>

    </div>

</body>

</html>
