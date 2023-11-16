<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif, 'poppins';
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
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
            padding: 2px;
        }

        h1 {
            font-size: 20px;
        }

        #result {
            text-align: center;
            font-size: 15px;
            font-weight: bold;
        }

        #number {
            text-align: center;
        }

        #overall {
            text-align: center;
            font-weight: bold;
        }

        .CsmReport {
            margin-top: 10px;
        }

        .CSMcc {
            margin-top: 10px;
        }

        .SQD {
            width: 100px;
            margin-top: 15px;
        }

        .SQD th {
            font-size: 12px;
        }

        #totalResult {
            text-align: center;
        }
    </style>
</head>

<body>

    <h1>Overall Services Surveyed
        by the
        University</h1>

    <table id="customers">
        <tr>
            {{-- <th>Offices</th> --}}
            <th>Overall Services</th>
            <th>Responses</th>
            <th>Total of Transaction</th>
        </tr>

        @foreach ($servicesData as $serviceTitle => $count)
            <tr>
                {{-- <td> {{ $service->serviceTitle }}</td> --}}
                <td> {{ $serviceTitle }}</td>
                <td id="number">{{ $count }}</td>
                <td id="number">{{ $count }}</td>

            </tr>
        @endforeach
        <tr>
            <td id="result">
                TOTAL RESULT
            </td>
            <td id="number">
                {{ $totalServices }}
            </td>
            <td id="number">
                {{ $totalServiceTransaction }}
            </td>
        </tr>
        <tr>
            <td id="result">
                OVERALL RESULT
            </td>
            <td id="overall">
                {{ $multiplyByHundred }}%
            </td>
            <td>

            </td>
        </tr>

    </table>

    <div class="CsmReport">
        <table id="customers">
            <tr>
                <th>Scale</th>
                <th>Average</th>
                <th>Rating</th>
            </tr>


            <tr>
                <td>
                    1
                </td>
                <td>
                    1.00-1.49
                </td>
                <td>
                    Strongly Unsatisfied
                </td>
            </tr>
            <tr>
                <td>
                    2
                </td>
                <td>
                    1.50-2.49
                </td>
                <td>
                    Unsatisfied
                </td>
            </tr>
            <tr>
                <td>
                    3
                </td>
                <td>
                    2.50-3.49
                </td>
                <td>
                    Neither Satisfied nor Unsatisfied
                </td>
            </tr>
            <tr>
                <td>
                    4
                </td>
                <td>
                    3.50-4.49
                </td>
                <td>
                    Satisfied
                </td>
            </tr>
            <tr>
                <td>
                    4
                </td>
                <td>
                    4.50-5.00
                </td>
                <td>
                    Very Satisfied
                </td>
            </tr>
        </table>

        {{-- Citizen Charter --}}
        <table id="customers" class="CSMcc">
            <tr>
                <th>CSM Report</th>
                <th>Response</th>
                <th>Percentage</th>
            </tr>

            @foreach ($cc1Report as $ccOption => $count)
                <tr>
                    <td>
                        {{ $ccOption }}
                    </td>
                    <td id="totalResult">
                        {{ $count }}
                    </td>
                    <td id="totalResult">
                        {{ $cc1Percentage[$ccOption] }}%
                    </td>
                </tr>
            @endforeach
            <tr>
                <td>

                </td>
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
                    <td id="totalResult">
                        {{ $count }}
                    </td>
                    <td id="totalResult">
                        {{ $cc2Percentage[$ccOption] }}%
                    </td>
                </tr>
            @endforeach
            <tr>
                <td>

                </td>
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
                    <td id="totalResult">
                        {{ $count }}
                    </td>
                    <td id="totalResult">
                        {{ $cc3Percentage[$ccOption] }}%
                    </td>
                </tr>
            @endforeach

        </table>

        <table id="customers" class="SQD">
            <tr>
                <th>Service Quality Dimension</th>
                <th>Not Applicable</th>
                <th>Strongly Disagree</th>
                <th> Disagree</th>
                <th>Neither Agree nor Disagree</th>
                <th>Agree</th>
                <th>Strongly Agree</th>
                <th>Response</th>
                <th>Ratings</th>
            </tr>

            @foreach (json_decode($SqdResult->getContent(), true) as $question => $result)
                <tr>
                    <td>{{ $question }}</td>
                    <td id="totalResult">{{ $result['counts'][0] }}</td>
                    <td id="totalResult">{{ $result['counts'][1] }}</td>
                    <td id="totalResult">{{ $result['counts'][2] }}</td>
                    <td id="totalResult">{{ $result['counts'][3] }}</td>
                    <td id="totalResult">{{ $result['counts'][4] }}</td>
                    <td id="totalResult">{{ $result['counts'][5] }}</td>
                    <td id="totalResult">{{ $result['original_sum'] }}</td>
                    <td id="totalResult">{{ $result['rate'] }}</td>
                </tr>
            @endforeach
        </table>
        <table id="customers" class="SQD">
            <tr>
                <th>Service Quality Dimension</th>
                <th>Ratings</th>
            </tr>

            @foreach (json_decode($ServiceRate->getContent(), true) as $serviceCounts => $result)
                <tr>
                    <td>{{ $serviceCounts }}</td>
                    <td id="totalResult">{{ $result['serviceCountsTotalRateOfService'] }}</td>
                </tr>
            @endforeach
        </table>

    </div>

</body>

</html>
