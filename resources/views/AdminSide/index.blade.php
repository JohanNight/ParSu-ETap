@include('partials.headerAdmin')
<!-- component -->
<div class="flex flex-col min-h-screen bg-gray-100">

    <!-- Top navigation bar -->
    <x-NavigationTop />
    <!-- Main Content -->
    <div class="flex-1 flex flex-wrap">
        <!-- Navigation sidebar (hidden on small devices) -->
        <x-NavigationLeft />


        <!--Main content area -->
        <div class="flex-1 p-4 w-full md:w-1/2 bg-gray-200 min-h-screen">
            <!-- Search field -->
            {{-- <div class="relative max-w-md w-full">
                <div class="absolute top-1 left-2 inline-flex items-center p-2">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input
                    class="w-full h-10 pl-10 pr-4 py-1 text-base placeholder-gray-500 border rounded-full focus:shadow-outline"
                    type="search" placeholder="Search...">
            </div> --}}

            <!-- Graphics Container -->
            <div class="mt-8 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">
                <!-- First container -->
                <!-- Section 1 - User Chart -->
                <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                    <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize">Total Service Answered</h2>
                    <div class="my-1"></div> <!-- Separation space -->
                    <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                    <!--Line with gradient-->
                    <div class="chart-container" style="position: relative; height:300px; width:100%">
                        <!-- The canvas for the graph -->
                        {{-- <canvas id="usersChart1"></canvas> --}}
                        {!! $totalDataPerServices->container() !!}

                    </div>
                </div>

                <!-- Second container -->
                <!-- Section 2 - Trade Chart -->
                <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                    <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize">Feedback </h2>
                    <div class="my-1"></div> <!-- Separation space -->
                    <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                    <!-- Line with gradient -->
                    <div class="chart-container" style="position: relative; height:300px; width:100%">
                        <!-- The canvas for the graph -->
                        {{-- <canvas id="totalFeedBackChart[2]"></canvas> --}}
                        {!! $totalClientSatisfaction->container() !!}
                    </div>
                </div>
            </div>

            <!-- Third container below the previous two -->
            <!-- Section 3 - Table of Pending Authorizations -->
            <div class="mt-8 bg-white p-4 shadow rounded-lg">
                <h2 class="text-gray-500 text-lg SemiB-font pb-4 capitalize">Available Services</h2>
                <div class="my-1"></div> <!-- Separation space -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <!-- Line with gradient -->
                <table class="w-full table-auto text-sm">
                    <thead>
                        <tr class="text-sm leading-normal">
                            <th
                                class="py-2 px-4 bg-grey-lightest Bold-font uppercase text-sm text-grey-light border-b border-grey-light">
                                Code</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest Bold-font uppercase text-sm text-grey-light border-b border-grey-light">
                                Title</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest Bold-font uppercase text-sm text-grey-light border-b border-grey-light">
                                Inspect</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">{{ $service->serviceCode }}
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font">{{ $service->serviceTitle }}
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light Reg-font"> <a
                                        href="/indexAdmin/editService/{{ $service->idServiceSpecification }}"
                                        class="bg-green-600 text-white text-sm px-3 py-1 rounded-2xl Reg-font">
                                        Edit
                                    </a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- "See more" button for the Pending Authorizations table -->
                <div class="text-right mt-4">
                    <a href="{{ route('Storage') }}"
                        class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded">
                        See more
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

{!! $totalDataPerServices->script() !!}
{!! $totalClientSatisfaction->script() !!}

@include('partials.footerAdmin')
