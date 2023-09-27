@include('partials.headerAdmin')
<!-- component -->
<div class="flex flex-col min-h-screen bg-gray-100">
    <!-- Top navigation bar -->
    <x-NavigationTop2 />

    <div class="flex-1 flex flex-wrap">
        <!-- Navigation sidebar (hidden on small devices) -->
        <x-NavigationLeft />

        <!--Main content area -->
        <div class="flex-1  py-2 px-4 w-full md:w-1/2 bg-gray-200 min-h-screen">
            <!--Filter-->
            <div class="flex p-1 w-full justify-center items-center gap-10 rounded-md bg-white mt-2 mb-3 shadow-md">
                <div class=" bg-white border-2 p-2" id="fltr_from">
                    <label for="date_from" class="text-[18px] Reg-font ml-2">From:</label>
                    <input type="date" class="p-1 rounded-md border-2 border-black focus:outline-none">
                </div>
                <div class=" bg-white border-2 p-2" id="fltr_to">
                    <label for="date_to" class="text-[18px] Reg-font ml-2">To:</label>
                    <input type="date" class="p-1 rounded-md border-2 border-black focus:outline-none">
                </div>
                <button type="button" id="fltr_date"
                    class="text-[18px] Reg-font bg-green-300 active:bg-green-400 rounded-md px-3 py-1">
                    Filter
                </button>
                <button type="button" id="assess_report"
                    class="text-[18px] Reg-font bg-blue-400 active:bg-blue-500 rounded-md px-3 py-1 text-white">
                    Assess
                </button>

            </div>
            <!--Graph 1-->
            <div class="flex-1 bg-white p-4 shadow-md rounded-lg md:w-full mt-3">
                <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize">Overall Survey Distributed by the
                    Offices/Colleges</h2>
                <div class="my-1"></div> <!-- Separation space -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <!--Line with gradient-->
                <div class="chart-container" style="position: relative; height:300px; width:100%">
                    <!-- The canvas for the graph -->
                    <canvas id="usersChart[2]"></canvas>
                </div>
            </div>
            <!--Graph 2-->
            <div class="flex-1 bg-white p-4 shadow-md rounded-lg md:w-full mt-3">
                <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize">Overall Survey Answered by Clients</h2>
                <div class="my-1"></div> <!-- Separation space -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <!--Line with gradient-->

                <div class="chart-container" class="flex" style="position: relative; height:300px; width:100%">
                    <!-- The canvas for the graph -->
                    <canvas id="usersChart[3]"></canvas>
                </div>
            </div>
            <!-- Second container -->
            <!-- Section 2 - FeedBack -->
            <div class="flex-1 mt-2 mb-3 bg-white p-4 shadow rounded-lg w-full">
                <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize">Over All Feedback of Clients </h2>
                <div class="my-1"></div> <!-- Separation space -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <!-- Line with gradient -->
                <div class="chart-container" style="position: relative; height:300px; width:100%">
                    <!-- The canvas for the graph -->
                    <canvas id="feedBackChart[1]"></canvas>
                </div>
            </div>

            <div class="md:w-full bg-white p-3 mt-2 mb-3 shadow-md rounded-lg ">
                <div class="w-full p-2">
                    <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize"> Service Available</h2>
                    <div class="my-1"></div> <!-- Separation space -->
                    <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                </div>
                <table class="w-full table-auto text-sm">
                    <thead>
                        <tr class="text-sm leading-normal">
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                                Number
                            </th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                                Title</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-grey-lighter text-center">
                            <td class="py-2 px-4 border-b border-grey-light text-[20px] SemiB-font">1</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">Service 1</td>
                            <td class="py-2 px-4 border-b border-grey-light"></td>
                        </tr>
                        <!-- Add more rows here like the one above for each pending authorization -->
                        <tr class="hover:bg-grey-lighter text-center">
                            <td class="py-2 px-4 border-b border-grey-light text-[20px] SemiB-font">2</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">Service 2</td>
                            <td class="py-2 px-4 border-b border-grey-light"></td>
                        </tr>
                        </tr>
                        <tr class="hover:bg-grey-lighter text-center">
                            <td class="py-2 px-4 border-b border-grey-light text-[20px] SemiB-font">3</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">Service 3</td>
                            <td class="py-2 px-4 border-b border-grey-light"></td>
                        </tr>
                        <tr class="hover:bg-grey-lighter text-center">
                            <td class="py-2 px-4 border-b border-grey-light text-[20px] SemiB-font">4</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">Service 4</td>
                            <td class="py-2 px-4 border-b border-grey-light"></td>
                        </tr>
                        <tr class="hover:bg-grey-lighter text-center">
                            <td class="py-2 px-4 border-b border-grey-light text-[20px] SemiB-font">5</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">Service 5</td>
                            <td class="py-2 px-4 border-b border-grey-light"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<script>
    ServiceBarChart();

    function ServiceBarChart() {
        const labels = ['Office 1', 'Office 2', 'Office 3', 'Office 4']; // Updated labels
        const data = {
            labels: labels,
            datasets: [{
                label: 'Overall Distributed Survey',
                data: [65, 59, 80, 81], // Update this data with your specific values
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                ],
                borderWidth: 1,
            }],
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
                responsive: true, // Allow the chart to be responsive
                maintainAspectRatio: false, // Prevent maintaining aspect ratio
            },
        };
        const ctx = document.getElementById('usersChart[2]').getContext('2d');
        new Chart(ctx, config);
    }


    AnsweredByClient();

    function AnsweredByClient() {
        const labels = ['Student', 'Personnel/Non-Personnel', 'Visitor', ]; // Updated labels
        const data = {
            labels: labels,
            datasets: [{
                label: 'Overall Survey Answered by Clients',
                data: [65, 59, 80], // Update this data with your specific values
                backgroundColor: [
                    '#044389',
                    '#FCFF4B',
                    '#03CEA4',

                ],
                borderColor: [
                    '#044389',
                    '#FCFF4B',
                    '#03CEA4',

                ],
                borderWidth: 1,
            }],
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
                responsive: true, // Allow the chart to be responsive
                maintainAspectRatio: false, // Prevent maintaining aspect ratio
            },
        };
        const ctx = document.getElementById('usersChart[3]').getContext('2d');
        new Chart(ctx, config);
    }


    var feedBackChartChart = new Chart(document.getElementById('feedBackChart[1]'), {
        type: 'pie',
        data: {
            labels: ['Very Satisfied', 'Satisfied', 'Neutral', 'Dissatisfied', 'Very Dissastisfied',
                'Not Applicable'
            ],
            datasets: [{
                data: [60, 40, 25, 15, 5, 0],
                backgroundColor: ['#FEC500', '#F2A359', '#8B8B8D', '#FC2F00', '#ED1C24', '#020100'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'bottom' // Ubicar la leyenda debajo del círculo
            }
        }
    });
</script>

@include('partials.footerAdmin')
