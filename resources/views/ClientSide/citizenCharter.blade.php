@include('partials.headerClient')
<div class="relative">
    <!-- background Image -->
    <div class=" absolute w-full ">
        <img src="{{ asset('images/Entrance.jpg') }}" class="h-[100dvh] bg-no-repeat w-full opacity-80" alt="">
    </div>
    <div class=" min-h-screen w-full absolute">
        <x-navBarClient /><!-- Header -->

        <!--Title Section-->
        <section class="m-1 mt-[20px] flex justify-center items-center">
            <header class="  tracking-widest bg-blue-500 rounded-md p-2">
                <h1 class="text-yellow-400 text-4xl sm:text-2xl md:text-4xl shadow-md ExBold-font">ParSU Citizen's
                    Charter
                </h1>
            </header>
        </section>

        <!--Search Section-->
        <section class="flex justify-center items-center m-4 px-1">
            <div class="flex shadow-md border-lg" x-data="{ open: false }">

                <div class="relative flex ">
                    <button id="button-dropdown" data-dropdown-toggle="dropdown"
                        class="bg-gray-50 flex-shrink-0 inline-flex items-center px-1 min-h-6 rounded-l-lg border border-gray-300 border-l text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring focus:outline-none focus:ring-gray-100 text-lg Reg-font"
                        type="button" @click="open = !open">Categories
                        <svg :class="{ 'transform rotate-180': open }" class="w-4 h-4 ml-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false"
                        class="bg-white rounded-lg mt-2 py-2 bg-white divide-y divide-gray-100 shadow-10 absolute z-50 top-12"
                        id="dropdown" style="min-width: 100px; max-height: 200px; overflow-y: auto;">
                        <ul class="py-2 text-sm text-gray-700 Reg-font capitalize">
                            <li><button type="button"
                                    class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Academic
                                </button>
                            </li>
                            <li><button type="button"
                                    class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Guidance,
                                    Admission, and Placement</button>
                            </li>
                            <li><button type="button"
                                    class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Assessment
                                    Office</button>
                            </li>
                            <li><button type="button"
                                    class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Bids and
                                    Awards
                                    Committee Office</button>
                            </li>
                            <li><button type="button"
                                    class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Budget
                                    Office</button>
                            </li>
                            <li><button type="button"
                                    class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Business
                                    Affairs
                                    Office</button>
                            </li>
                            <li><button type="button"
                                    class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Cashiering
                                    Office</button>
                            </li>
                            <li><button type="button"
                                    class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Informtion
                                    and
                                    Communication Technology Management Office (ICTMO)</button>
                            </li>
                            <li><button type="button"
                                    class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Document
                                    Control
                                    Office</button>
                            </li>
                            <li><button type="button"
                                    class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Library</button>
                            </li>
                            <li><button type="button"
                                    class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Medical and
                                    Dental
                                    Clinic</button>
                            </li>
                            <li><button type="button"
                                    class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Office of
                                    Students
                                    Affair and Services</button>
                            </li>
                            <li><button type="button"
                                    class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Physical
                                    Plan
                                    and
                                    Services</button>
                            </li>
                            <li><button type="button"
                                    class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Safety and
                                    Security
                                    Services</button>
                            </li>
                            <li><button type="button"
                                    class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Procurement
                                    Office</button>
                            </li>
                            <li><button type="button"
                                    class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">University
                                    Registrar's Office</button>
                            </li>
                            <!-- Add more categories as needed -->
                        </ul>
                    </div>
                    <input type="search" name="search_bar" id="search-down"
                        class="block bg-gray-50 w-96 h-12 p-2.5 border-l-gray-50 border-l-2 border border-gray-300 focus:ring-0 focus:outline-none focus:ring-gray-100 text-lg Reg-font placeholder:text-lg placeholder:Reg-font "
                        placeholder="Search">
                    <button type="submit"
                        class="bg-gray-50 flex-shrink-0 inline-flex items-center px-4 w-16 min-h-8 rounded-r-lg border border-gray-300 border-r text-gray-900 text-bold bg-gray-100 border border-gray-300 rounded-r-lg hover:bg-sky-200 active:bg-blue-400 focus:outline-none   font-normal">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </button>
                </div>


            </div>
        </section>
        <!--Search Data Section-->
        <section class="mt-10">
            <div class="overflow-x-auto relative w-full ">
                <div class="">
                    <!-- component -->
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="bg-blue-800 text-white border-b text-left">
                                            <tr>
                                                <th scope="col" class="text-sm SemiB-font  px-6 py-4 ">
                                                    Code
                                                </th>
                                                <th scope="col" class="text-sm  SemiB-font px-6 py-4 ">
                                                    Title
                                                </th>
                                                <th scope="col" class="text-sm  SemiB-font px-6 py-4 ">
                                                    Offices
                                                </th>

                                                <th scope="col" class="text-sm  SemiB-font  px-6 py-4 ">
                                                    Handle
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-left">
                                            @foreach ($services as $service)
                                                <tr
                                                    class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm Med-font text-gray-900">
                                                        {{ $service->code_Title }}</td>
                                                    <td
                                                        class="text-sm text-gray-900 Reg-font px-6 py-4 whitespace-nowrap">
                                                        {{ $service->service_Title }}
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 Reg-font px-6 py-4 whitespace-nowrap">
                                                        {{ $service->office_service }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <a href="/home/Document/{{ $service->id }}"
                                                            class="bg-green-600 text-white text-sm px-3 py-1 rounded-2xl Reg-I-font active:bg-green-700">
                                                            View
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

</div>
@include('partials.footerClient')
