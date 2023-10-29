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
            <th>Total of Transaction</th>
        </tr>
        @foreach ($getTotalServiceAvail as $serviceTitle => $count)
            <tr>
                <td> {{ $serviceTitle }}</td>
                <td>{{ $count }}</td>
                <td>{{ $count }}</td>
            </tr>
        @endforeach
    </table>

</body>

</html>



{{-- @include('partials.headerAdmin')
<!-- Table of Survey Service External-->
<div class="md:w-full bg-white p-3 mt-2 mb-3 shadow-md rounded-lg ">
    <div class="w-full p-2">
        <h2 class="text-gray-500 text-lg font-semibold pb-1 capitalize"> Table 1.1: Overall Services Surveyed
            by the
            University</h2>
        <div class="my-1"></div> <!-- Separation space -->
        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 mb-6"></div>
    </div>
    <table class="w-full table-auto text-sm border-2 border-collapse border-black" id="serviceTable">
        <thead>
            <tr class="leading-normal">
                <th scope="row"
                    class="py-2 px-4 bg-grey-lightest font-bold uppercase text-[15px]text-black border-b border-grey-light">
                    Overall Services
                </th>
                <th scope="row"
                    class="py-2 px-4 bg-grey-lightest  font-bold uppercasetext-[15px] text-black border-b border-grey-light">
                    Responses</th>
                <th scope="row"
                    class="py-2 px-4 bg-grey-lightest  font-bold uppercase text-[15px] text-black border-b border-grey-light">
                    Total of Transaction
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($getTotalServiceAvail as $serviceTitle => $count)
                <tr class="hover:bg-grey-lighter text-center">
                    <td class="py-2 px-4 border-2 border-grey-light text-[10px] font-semibold">
                        {{ $serviceTitle }}</td>
                    <td class="py-2 px-4 border-2 border-grey-light text-[10px] font-regular">
                        {{ $count }}</td>
                    <td class="py-2 px-4 border-2 border-grey-light text-[10px] font-regular">{{ $count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('partials.footerAdmin') --}}
