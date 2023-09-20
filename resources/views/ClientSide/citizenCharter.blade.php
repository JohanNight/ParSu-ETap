@include('partials.headerClient')
<x-navBarClient /><!-- Header -->

<!--Title Section-->
<section class="m-1 mt-[20px] flex justify-center items-center">
    <header class="  tracking-widest bg-blue-500 rounded-md p-2">
        <h1 class="text-yellow-400 text-4xl sm:text-2xl md:text-4xl shadow-md ExBold-font">ParSU Citizen's Charter</h1>
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
                            class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Academic </button>
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
                            class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Bids and Awards
                            Committee Office</button>
                    </li>
                    <li><button type="button"
                            class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Budget
                            Office</button>
                    </li>
                    <li><button type="button"
                            class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Business Affairs
                            Office</button>
                    </li>
                    <li><button type="button"
                            class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Cashiering
                            Office</button>
                    </li>
                    <li><button type="button"
                            class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Informtion and
                            Communication Technology Management Office (ICTMO)</button>
                    </li>
                    <li><button type="button"
                            class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Document Control
                            Office</button>
                    </li>
                    <li><button type="button"
                            class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Library</button>
                    </li>
                    <li><button type="button"
                            class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Medical and Dental
                            Clinic</button>
                    </li>
                    <li><button type="button"
                            class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Office of Students
                            Affair and Services</button>
                    </li>
                    <li><button type="button"
                            class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Physical Plan and
                            Services</button>
                    </li>
                    <li><button type="button"
                            class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">Safety and Security
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
    <div class="overflow-x-auto relative ">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-blue-400">
                <tr>
                    <th scope="col" class="py-3 px-6 text-center">Types Services</th>
                    <th scope="col" class="py-3 px-6 text-center">Services Titles</th>
                    <th scope="col" class="py-3 px-6 text-center">Service Site</th>
                </tr>
            </thead>
            <tbody class="text-white">
                <tr class="bg-gray-800 border-b ">
                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>

                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>


                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>
                </tr>
                <tr class="bg-gray-800 border-b ">

                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>


                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>


                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>
                </tr>
                <tr class="bg-gray-800 border-b ">

                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>


                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>


                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>
                </tr>
                <tr class="bg-gray-800 border-b ">

                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>


                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>


                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>
                </tr>
                <tr class="bg-gray-800 border-b ">

                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>


                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>


                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>
                </tr>
                <tr class="bg-gray-800 border-b ">

                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>


                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>


                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>
                </tr>
                <tr class="bg-gray-800 border-b ">

                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>


                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>


                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>
                </tr>
                <tr class="bg-gray-800 border-b ">

                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>


                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>


                    <td class="py-4 px-6 border-r">
                        Lorem ipsum dolor sit .
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@include('partials.footerClient')
