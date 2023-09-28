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
            <!--Filter-->
            <div class="flex p-1 w-full justify-center items-center gap-10 rounded-md bg-white mt-2 mb-3 shadow-md">
                <div class=" bg-white border-2 p-2" id="fltr_from_admin">
                    <label for="date_from" class="text-[18px] Reg-font ml-2">From:</label>
                    <input type="date" class="p-1 rounded-md border-2 border-black focus:outline-none">
                </div>
                <div class=" bg-white border-2 p-2" id="fltr_to_admin">
                    <label for="date_to" class="text-[18px] Reg-font ml-2">To:</label>
                    <input type="date" class="p-1 rounded-md border-2 border-black focus:outline-none">
                </div>
                <button type="button" id="fltr_date_admin"
                    class="text-[18px] Reg-font bg-green-300 active:bg-green-400 rounded-md px-3 py-1">
                    Filter
                </button>
                <button type="button" id="assess_report_admin"
                    class="text-[18px] Reg-font bg-blue-400 active:bg-blue-500 rounded-md px-3 py-1 text-white">
                    Assess
                </button>

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
                    <canvas id="ovryAllSrvyChart[1]"></canvas>
                </div>
            </div>
            <!--Graph 2 Overall Client-->
            <div class="flex-1 bg-white p-4 shadow-md rounded-lg md:w-full mt-3">
                <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize">Overall Survey Answered by Clients</h2>
                <div class="my-1"></div> <!-- Separation space -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <!--Line with gradient-->

                <div class="chart-container" class="flex" style="position: relative; height:300px; width:100%">
                    <!-- The canvas for the graph -->
                    <canvas id="ovrClientChart[1]"></canvas>
                </div>
            </div>
            <!-- Graph - FeedBack -->
            <div class="flex-1 mt-2 mb-3 bg-white p-4 shadow rounded-lg w-full">
                <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize">Overall Sarisfaction of Clients </h2>
                <div class="my-1"></div> <!-- Separation space -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <!-- Line with gradient -->
                <div class="chart-container" style="position: relative; height:300px; width:100%">
                    <!-- The canvas for the graph -->
                    <canvas id="feedBackChart[1]"></canvas>
                </div>
            </div>

            <!-- Table of Survey Service External-->
            <div class="md:w-full bg-white p-3 mt-2 mb-3 shadow-md rounded-lg ">
                <div class="w-full p-2">
                    <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize"> Table 1.1: Overall Services Surveyed
                        by the
                        University</h2>
                    <div class="my-1"></div> <!-- Separation space -->
                    <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                </div>
                <table class="w-full table-auto text-sm">
                    <thead>
                        <tr class="text-sm leading-normal">
                            <th
                                class="py-2 px-4 bg-grey-lightest Bold-font uppercase text-lg text-black border-b border-grey-light">
                                External Services
                            </th>
                            <th
                                class="py-2 px-4 bg-grey-lightest  Bold-font uppercase text-lg text-black border-b border-grey-light">
                                Responses</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest  Bold-font uppercase text-lg text-black border-b border-grey-light">
                                Total of Transaction
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-grey-lighter text-center">
                            <td class="py-2 px-4 border-b border-grey-light text-[18px] SemiB-font">Service 1</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">1</td>
                            <td class="py-2 px-4 border-b border-grey-light">1</td>
                        </tr>
                        <!-- Add more rows here like the one above for each pending authorization -->
                        <tr class="hover:bg-grey-lighter text-center">
                            <td class="py-2 px-4 border-b border-grey-light text-[18px] SemiB-font">Service 2</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">2</td>
                            <td class="py-2 px-4 border-b border-grey-light">2</td>
                        </tr>
                        </tr>
                        <tr class="hover:bg-grey-lighter text-center">
                            <td class="py-2 px-4 border-b border-grey-light text-[18px] SemiB-font">Service 3</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font"> 3</td>
                            <td class="py-2 px-4 border-b border-grey-light">3</td>
                        </tr>
                        <tr class="hover:bg-grey-lighter text-center">
                            <td class="py-2 px-4 border-b border-grey-light text-[18px] SemiB-font">Service 4</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font"> 4</td>
                            <td class="py-2 px-4 border-b border-grey-light">4</td>
                        </tr>
                        <tr class="hover:bg-grey-lighter text-center">
                            <td class="py-2 px-4 border-b border-grey-light text-[18px] SemiB-font">Service 5</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font"> 5</td>
                            <td class="py-2 px-4 border-b border-grey-light">5</td>
                        </tr>
                        <tr class="hover:bg-grey-lighter text-center">
                            <td class="py-2 px-4 border-b border-grey-light text-[18px] SemiB-font">Total</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font"> 15</td>
                            <td class="py-2 px-4 border-b border-grey-light">15</td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex justify-between w-full">
                    <button type="button"
                        class="text-[14px] Reg-font bg-gray-500 active:bg-gray-600 rounded-lg p-2 text-white mt-2">
                        Preview
                    </button>
                    <button type="button"
                        class="text-[14px] Reg-font bg-green-500 active:bg-green-600 rounded-lg p-2 text-white mt-2">
                        Next
                    </button>
                </div>
                <div class="flex justify-center items-center w-full mt-4 ">
                    <p class="text-[18px] Reg-font text-justify">The Overall Services Surveyed by the University of
                        External Services
                        from <span class="text-blue-400">this week
                        </span> to <span class="text-sky-400"> this
                            week</span> is <span class="underline text-sky-500"> 15</span></p>
                </div>
            </div>
            <!-- Table of Survey Service Internal-->
            <div class="md:w-full bg-white p-3 mt-2 mb-3 shadow-md rounded-lg ">
                <div class="w-full p-2">
                    <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize">Table 1.2: Overall Services Surveyed by
                        the
                        University</h2>
                    <div class="my-1"></div> <!-- Separation space -->
                    <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                </div>
                <table class="w-full table-auto text-sm">
                    <thead>
                        <tr class="text-sm leading-normal">
                            <th
                                class="py-2 px-4 bg-grey-lightest Bold-font uppercase text-lg text-black border-b border-grey-light">
                                Internal Services
                            </th>
                            <th
                                class="py-2 px-4 bg-grey-lightest  Bold-font uppercase text-lg text-black border-b border-grey-light">
                                Responses</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest  Bold-font uppercase text-lg text-black border-b border-grey-light">
                                Total of Transaction
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-grey-lighter text-center">
                            <td class="py-2 px-4 border-b border-grey-light text-[18px] SemiB-font">Service 1</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">1</td>
                            <td class="py-2 px-4 border-b border-grey-light">1</td>
                        </tr>
                        <!-- Add more rows here like the one above for each pending authorization -->
                        <tr class="hover:bg-grey-lighter text-center">
                            <td class="py-2 px-4 border-b border-grey-light text-[18px] SemiB-font">Service 2</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">2</td>
                            <td class="py-2 px-4 border-b border-grey-light">2</td>
                        </tr>
                        </tr>
                        <tr class="hover:bg-grey-lighter text-center">
                            <td class="py-2 px-4 border-b border-grey-light text-[18px] SemiB-font">Service 3</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font"> 3</td>
                            <td class="py-2 px-4 border-b border-grey-light">3</td>
                        </tr>
                        <tr class="hover:bg-grey-lighter text-center">
                            <td class="py-2 px-4 border-b border-grey-light text-[18px] SemiB-font">Service 4</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font"> 4</td>
                            <td class="py-2 px-4 border-b border-grey-light">4</td>
                        </tr>
                        <tr class="hover:bg-grey-lighter text-center">
                            <td class="py-2 px-4 border-b border-grey-light text-[18px] SemiB-font">Service 5</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font"> 5</td>
                            <td class="py-2 px-4 border-b border-grey-light">5</td>
                        </tr>
                        <tr class="hover:bg-grey-lighter text-center">
                            <td class="py-2 px-4 border-b border-grey-light text-[18px] SemiB-font">Total</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font"> 15</td>
                            <td class="py-2 px-4 border-b border-grey-light">15</td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex justify-between w-full">
                    <button type="button"
                        class="text-[14px] Reg-font bg-gray-500 active:bg-gray-600 rounded-lg p-2 text-white mt-2">
                        Preview
                    </button>
                    <button type="button"
                        class="text-[14px] Reg-font bg-green-500 active:bg-green-600 rounded-lg p-2 text-white mt-2">
                        Next
                    </button>
                </div>
                <div class="flex justify-center items-center w-full mt-4 ">
                    <p class="text-[18px] Reg-font text-justify">The Overall Services Surveyed by the University of
                        Internal Services
                        from <span class="text-blue-400">this week
                        </span> to <span class="text-sky-400"> this
                            week</span> is <span class="underline text-sky-500"> 15</span></p>
                </div>
            </div>
            <!-- Tables of Client Servey Measurement-->
            <div class="flex flex-col gap-4 mt-2">
                <div class="mt-6 mb-2">
                    <header class="text-center border-b-2 border-b-black">
                        <h1 class="text-2xl Bold-font text-black">
                            Result of Harmonized Client Satisfaction Measurement
                        </h1>
                    </header>
                </div>
                <!-- Table of Survey Service of Citizen Charter-->
                <div class="md:w-full bg-white p-3 mt-2 mb-3 shadow-md rounded-lg ">
                    <div class="w-full p-2">
                        <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize tracking-wide"> Table 2.1: Overall
                            Count of
                            Citizen's
                            Charter
                        </h2>
                        <div class="my-1"></div> <!-- Separation space -->
                        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                    </div>
                    <table class="w-full table-auto text-sm">
                        <thead>
                            <tr class="text-sm leading-normal">
                                <th
                                    class="py-2 px-4 bg-grey-lightest Bold-font uppercase text-lg text-black border-b border-grey-light">
                                    External Services
                                </th>
                                <th
                                    class="py-2 px-4 bg-grey-lightest  Bold-font uppercase text-lg text-black border-b border-grey-light">
                                    Responses</th>
                                <th
                                    class="py-2 px-4 bg-grey-lightest  Bold-font uppercase text-lg text-black border-b border-grey-light">
                                    Total of Transaction
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px] SemiB-font">CC1 Service 1
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">1</td>
                                <td class="py-2 px-4 border-b border-grey-light">1</td>
                            </tr>
                            <!-- Add more rows here like the one above for each pending authorization -->
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px] SemiB-font"> CC2 Service 2
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">2</td>
                                <td class="py-2 px-4 border-b border-grey-light">2</td>
                            </tr>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px] SemiB-font"> CC3 Service 3
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font"> 3</td>
                                <td class="py-2 px-4 border-b border-grey-light">3</td>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px] SemiB-font">CC4 Service 4
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font"> 4</td>
                                <td class="py-2 px-4 border-b border-grey-light">4</td>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px] SemiB-font"> CC5 Service 5
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font"> 5</td>
                                <td class="py-2 px-4 border-b border-grey-light">5</td>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px] SemiB-font">Total</td>
                                <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font"> 15</td>
                                <td class="py-2 px-4 border-b border-grey-light">15</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-between w-full">
                        <button type="button"
                            class="text-[14px] Reg-font bg-gray-500 active:bg-gray-600 rounded-lg p-2 text-white mt-2">
                            Preview
                        </button>
                        <button type="button"
                            class="text-[14px] Reg-font bg-green-500 active:bg-green-600 rounded-lg p-2 text-white mt-2">
                            Next
                        </button>
                    </div>
                    <div class="flex justify-center items-center w-full mt-4 ">
                        <p class="text-[18px] Reg-font text-justify">The Overall Number Counted by the University for
                            the Citizen's Charter in the External Services
                            from <span class="text-blue-400">this week
                            </span> to <span class="text-sky-400"> this
                                week</span> is <span class="underline text-sky-500"> 15</span></p>
                    </div>
                </div>

                <!-- Table of Service Quality Dimension-->
                <div class="md:w-full bg-white p-3 mt-2 mb-3 shadow-md rounded-lg ">
                    <div class="w-full p-2">
                        <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize tracking-wide">Table 2.1.1: Overall
                            Result per Service
                            Quality Dimension
                        </h2>
                        <div class="my-1"></div> <!-- Separation space -->
                        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                    </div>
                    <table class="w-full table-auto text-sm">
                        <thead>
                            <tr class="text-sm leading-normal">
                                <th
                                    class="py-2 px-4 bg-grey-lightest Bold-font uppercase text-lg text-black border-b border-grey-light">
                                    Service Quality Dimension
                                </th>
                                <th
                                    class="py-2 px-4 bg-grey-lightest  Bold-font uppercase text-lg text-black border-b border-grey-light">
                                    Strongly Agree</th>
                                <th
                                    class="py-2 px-4 bg-grey-lightest  Bold-font uppercase text-lg text-black border-b border-grey-light">
                                    Agree
                                </th>
                                <th
                                    class="py-2 px-4 bg-grey-lightest  Bold-font uppercase text-lg text-black border-b border-grey-light">
                                    Neutral
                                </th>
                                <th
                                    class="py-2 px-4 bg-grey-lightest  Bold-font uppercase text-lg text-black border-b border-grey-light">
                                    Disagree
                                </th>
                                <th
                                    class="py-2 px-4 bg-grey-lightest  Bold-font uppercase text-lg text-black border-b border-grey-light">
                                    Very Disagree
                                </th>
                                <th
                                    class="py-2 px-4 bg-grey-lightest  Bold-font uppercase text-lg text-black border-b border-grey-light">
                                    Response
                                </th>
                                <th
                                    class="py-2 px-4 bg-grey-lightest  Bold-font uppercase text-lg text-black border-b border-grey-light">
                                    Ratings
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px] Reg-font">Responsiveness
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">1</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">1</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">1</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">1</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">1</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">1</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">1.1</td>
                            </tr>
                            <!-- Add more rows here like the one above for each pending authorization -->
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px]  Reg-font"> Reliability
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">2</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">2</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">2</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">2</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">2</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">2</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">2.2</td>
                            </tr>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px]  Reg-font"> Access and
                                    Facilities
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font"> 3</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">3</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">3</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">3</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">3</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">3</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">3.3</td>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px]  Reg-font">Communication
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font"> 4</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">4</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">4</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">4</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">4</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">4</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">4.4</td>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px]  Reg-font"> Cost
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font"> 5</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">5</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">5</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">5</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">5</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">5</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">5.5</td>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px]  Reg-font"> Integrity
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font"> 6</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">6</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">6</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">6</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">6</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">6</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">6.6</td>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px]  Reg-font"> Assurance
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">7</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">7</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">7</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">7</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">7</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">7</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">7.7</td>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px]  Reg-font">Outcome
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">8</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">8</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">8</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">8</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">8</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">8</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">8.8</td>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px] SemiB-font">Overall</td>
                                <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font"> 15</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">15</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">15</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">15</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">15</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">15</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">15</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-between w-full">
                        <button type="button"
                            class="text-[14px] Reg-font bg-gray-500 active:bg-gray-600 rounded-lg p-2 text-white mt-2">
                            Preview
                        </button>
                        <button type="button"
                            class="text-[14px] Reg-font bg-green-500 active:bg-green-600 rounded-lg p-2 text-white mt-2">
                            Next
                        </button>
                    </div>

                </div>

                <!-- Table of overall ratings of external services-->
                <div class="md:w-full bg-white p-3 mt-2 mb-3 shadow-md rounded-lg ">
                    <div class="w-full p-2">
                        <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize tracking-wide">Table 2.2: Overall
                            ratings of each services
                        </h2>
                        <div class="my-1"></div> <!-- Separation space -->
                        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                    </div>
                    <table class="w-full table-auto text-sm">
                        <thead>
                            <tr class="text-sm leading-normal">
                                <th
                                    class="py-2 px-4 bg-grey-lightest Bold-font uppercase text-lg text-black border-b border-grey-light">
                                    External Services
                                </th>

                                <th
                                    class="py-2 px-4 bg-grey-lightest  Bold-font uppercase text-lg text-black border-b border-grey-light">
                                    Overall Ratings
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px] Reg-font">Service 1
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">1.1</td>
                            </tr>
                            <!-- Add more rows here like the one above for each pending authorization -->
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px]  Reg-font"> Service 2
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">2.2</td>
                            </tr>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px]  Reg-font"> Service 3
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">3.3</td>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px]  Reg-font">Service 4
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">4.4</td>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px]  Reg-font"> Service 5
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">5.5</td>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px]  Reg-font">Service 6
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">6.6</td>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px]  Reg-font">Service 7
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">7.7</td>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px]  Reg-font">Service 8
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">8.8</td>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px] SemiB-font">Overall</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">15</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-between w-full">
                        <button type="button"
                            class="text-[14px] Reg-font bg-gray-500 active:bg-gray-600 rounded-lg p-2 text-white mt-2">
                            Preview
                        </button>
                        <button type="button"
                            class="text-[14px] Reg-font bg-green-500 active:bg-green-600 rounded-lg p-2 text-white mt-2">
                            Next
                        </button>
                    </div>

                </div>
                <!-- Table of overall ratings of internal services-->
                <div class="md:w-full bg-white p-3 mt-2 mb-3 shadow-md rounded-lg ">
                    <div class="w-full p-2">
                        <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize tracking-wide">Table 2.3: Overall
                            ratings of each services
                        </h2>
                        <div class="my-1"></div> <!-- Separation space -->
                        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                    </div>
                    <table class="w-full table-auto text-sm">
                        <thead>
                            <tr class="text-sm leading-normal">
                                <th
                                    class="py-2 px-4 bg-grey-lightest Bold-font uppercase text-lg text-black border-b border-grey-light">
                                    Internal Services
                                </th>

                                <th
                                    class="py-2 px-4 bg-grey-lightest  Bold-font uppercase text-lg text-black border-b border-grey-light">
                                    Overall Ratings
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px] Reg-font">Service 1
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">1.1</td>
                            </tr>
                            <!-- Add more rows here like the one above for each pending authorization -->
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px]  Reg-font"> Service 2
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">2.2</td>
                            </tr>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px]  Reg-font"> Service 3
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">3.3</td>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px]  Reg-font">Service 4
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">4.4</td>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px]  Reg-font"> Service 5
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">5.5</td>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px]  Reg-font">Service 6
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">6.6</td>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px]  Reg-font">Service 7
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">7.7</td>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px]  Reg-font">Service 8
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">8.8</td>
                            </tr>
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light text-[18px] SemiB-font">Overall</td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">15</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-between w-full">
                        <button type="button"
                            class="text-[14px] Reg-font bg-gray-500 active:bg-gray-600 rounded-lg p-2 text-white mt-2">
                            Preview
                        </button>
                        <button type="button"
                            class="text-[14px] Reg-font bg-green-500 active:bg-green-600 rounded-lg p-2 text-white mt-2">
                            Next
                        </button>
                    </div>

                </div>
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
        const ctx = document.getElementById('ovryAllSrvyChart[1]').getContext('2d');
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
        const ctx = document.getElementById('ovrClientChart[1]').getContext('2d');
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