{{-- @dd($totalUsers->container()); --}}
@include('partials.headerAdmin')
<!-- component -->
<div class="flex flex-col min-h-screen bg-gray-100">
    <!-- Top navigation bar -->
    <x-NavigationTop />

    <div class="flex-1 flex flex-wrap">
        <!-- Navigation sidebar (hidden on small devices) -->
        <x-NavigationLeft />

        <!--Main content area -->
        <div class="flex-1  py-2 px-4 w-full md:w-1/2 bg-gray-200 min-h-screen">

            <div
                class="flex flex-col sm:flex-row p-1 w-full justify-center items-center gap-2 rounded-md bg-white mt-2 mb-3 shadow-md">
                <!-- Filter Form -->
                <form action="/superAdmin/report" method="POST"
                    class="flex flex-col sm:flex-row justify-center items-center gap-1 w-full">
                    @csrf
                    <div class="bg-white border-2 p-2">
                        <label for="date_from" class="text-[18px] Reg-font ml-2">From:</label>
                        <input type="date" name="date_from" id="date_from"
                            class="p-1 rounded-md border-2 border-black focus:outline-none">
                    </div>
                    <div class="bg-white border-2 p-2">
                        <label for="date_to" class="text-[18px] Reg-font ml-2">To:</label>
                        <input type="date" name="date_to" id="date_to"
                            class="p-1 rounded-md border-2 border-black focus:outline-none">
                        @error('date_to')
                            <p class="text-red-400 text-sm p-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" id="fltr_date_admin"
                        class="text-[18px] Reg-font bg-green-300 active:bg-green-400 rounded-md px-3 py-1">
                        Filter
                    </button>
                </form>

                <!-- Assess Form -->
                <form action="{{ route('assesmentReport') }}" method="POST"
                    class="flex flex-col sm:flex-row justify-center items-center gap-1 w-full">
                    @csrf
                    <div class="bg-white border-2 p-2">
                        <label for="date_From" class="text-[18px] Reg-font ml-2">From:</label>
                        <input type="date" name="date_From" id="date_From"
                            class="p-1 rounded-md border-2 border-black focus:outline-none">
                    </div>
                    <div class="bg-white border-2 p-2">
                        <label for="date_To" class="text-[18px] Reg-font ml-2">To:</label>
                        <input type="date" name="date_To" id="date_To"
                            class="p-1 rounded-md border-2 border-black focus:outline-none">
                        @error('date_To')
                            <p class="text-red-400 text-sm p-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" id="assess_report_admin"
                        class="text-[18px] Reg-font bg-blue-400 active:bg-blue-500 rounded-md px-3 py-1 text-white">
                        Assess
                    </button>
                </form>
            </div>



            <!--Graph 1 Overall Survey-->
            <div class="flex-1 bg-white p-4 shadow-md rounded-lg md:w-full mt-3">
                <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize">Overall Survey Distributed by the
                    Offices/Colleges</h2>
                <div class="my-1"></div> <!-- Separation space -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <!--Line with gradient-->
                <div class="chart-container" style="position: relative; height:300px; width:100%">
                    <!-- The canvas for the graph -->
                    {{-- <canvas id="ovryAllSrvyChart[1]"></canvas> --}}
                    {!! $totalOffices->container() !!}
                </div>
            </div>
            <!--Graph 2 Overall Client-->
            <div class="flex-1 bg-white p-4 shadow-md rounded-lg md:w-full mt-3">
                <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize">Overall Number of Clients</h2>
                <div class="my-1"></div> <!-- Separation space -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <!--Line with gradient-->

                <div class="chart-container" class="flex" style="position: relative; height:300px; width:100%">
                    <!-- The canvas for the graph -->
                    {{-- <canvas id="ovrClientChart[1]"></canvas> --}}
                    {!! $totalUsers->container() !!}
                </div>
            </div>
            <!-- chart- FeedBack -->
            <div class="flex-1 mt-2 mb-3 bg-white p-4 shadow rounded-lg w-full">
                <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize">Overall Satisfaction of Clients </h2>
                <div class="my-1"></div> <!-- Separation space -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <!-- Line with gradient -->
                <div class="chart-container" style="position: relative; height:300px; width:100%">
                    <!-- The canvas for the pie chart -->
                    {!! $chart->container() !!}
                </div>
            </div>

            <!--Graph 3 Total of external services-->
            <div class="flex-1 bg-white p-4 shadow-md rounded-lg md:w-full mt-3">
                <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize">Total Number of External Services</h2>
                <div class="my-1"></div> <!-- Separation space -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <!--Line with gradient-->

                <div class="chart-container" class="flex" style="position: relative; height:300px; width:100%">
                    <!-- The canvas for the graph -->
                    {!! $totalExternalService->container() !!}
                </div>
            </div>

            <!--Graph 4 Total of internal services-->
            <div class="flex-1 bg-white p-4 shadow-md rounded-lg md:w-full mt-3">
                <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize">Total Number of Internal Services</h2>
                <div class="my-1"></div> <!-- Separation space -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <!--Line with gradient-->

                <div class="chart-container" class="flex" style="position: relative; height:300px; width:100%">
                    <!-- The canvas for the graph -->
                    {!! $totalInternalService->container() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include the Axios library -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/Chart.min.js" charset="utf-8"></script>
{{-- <script>
    // ServiceBarChart();

    // function ServiceBarChart() {
    //     const labels = ['Office 1', 'Office 2', 'Office 3', 'Office 4']; // Updated labels
    //     const data = {
    //         labels: labels,
    //         datasets: [{
    //             label: 'Overall Distributed Survey',
    //             data: [65, 59, 80, 81], // Update this data with your specific values
    //             backgroundColor: [
    //                 'rgb(255, 99, 132)',
    //                 'rgb(255, 159, 64)',
    //                 'rgb(255, 205, 86)',
    //                 'rgb(75, 192, 192)',
    //             ],
    //             borderColor: [
    //                 'rgb(255, 99, 132)',
    //                 'rgb(255, 159, 64)',
    //                 'rgb(255, 205, 86)',
    //                 'rgb(75, 192, 192)',
    //             ],
    //             borderWidth: 1,
    //         }],
    //     };

    //     const config = {
    //         type: 'bar',
    //         data: data,
    //         options: {
    //             scales: {
    //                 y: {
    //                     beginAtZero: true,
    //                 },
    //             },
    //             responsive: true, // Allow the chart to be responsive
    //             maintainAspectRatio: false, // Prevent maintaining aspect ratio
    //         },
    //     };
    //     const ctx = document.getElementById('ovryAllSrvyChart[1]').getContext('2d');
    //     new Chart(ctx, config);
    // }


    // AnsweredByClient();

    // function AnsweredByClient() {
    //     const labels = ['Student', 'Personnel/Non-Personnel', 'Visitor', ]; // Updated labels
    //     const data = {
    //         labels: labels,
    //         datasets: [{
    //             label: 'Total number of Clients',
    //             data: [65, 59, 80], // Update this data with your specific values
    //             backgroundColor: [
    //                 '#044389',
    //                 '#FCFF4B',
    //                 '#03CEA4',

    //             ],
    //             borderColor: [
    //                 '#044389',
    //                 '#FCFF4B',
    //                 '#03CEA4',

    //             ],
    //             borderWidth: 1,
    //         }],
    //     };

    //     const config = {
    //         type: 'bar',
    //         data: data,
    //         options: {
    //             scales: {
    //                 y: {
    //                     beginAtZero: true,
    //                 },
    //             },
    //             responsive: true, // Allow the chart to be responsive
    //             maintainAspectRatio: false, // Prevent maintaining aspect ratio
    //         },
    //     };
    //     const ctx = document.getElementById('ovrClientChart[1]').getContext('2d');
    //     new Chart(ctx, config);
    // }


    // var feedBackChartChart = new Chart(document.getElementById('feedBackChart[1]'), {
    //     type: 'pie',
    //     data: {
    //         labels: ['Very Satisfied', 'Satisfied', 'Neutral', 'Dissatisfied', 'Very Dissastisfied',
    //             'Not Applicable'
    //         ],
    //         datasets: [{
    //             data: [60, 40, 25, 15, 5, 0],
    //             backgroundColor: ['#FEC500', '#F2A359', '#8B8B8D', '#FC2F00', '#ED1C24', '#020100'],
    //         }]
    //     },
    //     options: {
    //         responsive: true,
    //         maintainAspectRatio: false,
    //         legend: {
    //             position: 'bottom' // Ubicar la leyenda debajo del círculo
    //         }
    //     }
    // });
</script> --}}
{!! $chart->script() !!}
{!! $totalUsers->script() !!}
{!! $totalOffices->script() !!}
{!! $totalExternalService->script() !!}
{!! $totalInternalService->script() !!}

<script>
    // date_autofill.js
    // Get the current date in the format "YYYY-MM-DD"
    var dateFrom = new Date().toISOString().split('T')[0];

    // Set the input field's value to today's date
    document.getElementById("date_From").value = dateFrom;

    // Get the current date in the format "YYYY-MM-DD"
    var dateTo = new Date().toISOString().split('T')[0];

    // Set the input field's value to today's date
    document.getElementById("date_To").value = dateTo;
</script>


@include('partials.footerAdmin')
