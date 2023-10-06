@include('partials.headerAdmin')

<div class="flex flex-col min-h-screen bg-gray-100">
    <!-- Top navigation bar -->
    <x-NavigationTop />
    <!-- Main content-->
    <div class="flex-1 flex flex-wrap">
        <!-- Navigation sidebar (hidden on small devices) -->
        <x-NavigationLeft />
        <!--Main Content Area-->
        <div class="flex-1 w-full md:w-10/12 bg-gray-200 min-h-screen p-10 ">
            <!-- component -->
            <div class="heading text-center Bold-font text-2xl m-5 text-gray-800">Service Storage</div>
            <div
                class=" mx-auto w-full  overflow-y-scroll text-gray-800 border border-gray-300 bg-white p-4 shadow-xl mb-6">

                <!-- component -->

                <!-- component -->
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="bg-white border-b">
                                        <tr>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Order
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Title
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Description
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Site
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-gray-100 border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                Service
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                Description
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap flex gap-5 items-center">
                                                <button
                                                    class="bg-green-600 text-white text-md px-3 py-1 rounded-2xl Reg-font">
                                                    Edit
                                                </button>
                                                <button
                                                    class="bg-orange-600 text-white text-md px-3 py-1 rounded-2xl Reg-font">
                                                    Archive
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="bg-white border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                Service
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                Description
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap flex gap-5 items-center">
                                                <button
                                                    class="bg-green-600 text-white text-md px-3 py-1 rounded-2xl Reg-font">
                                                    Edit
                                                </button>
                                                <button
                                                    class="bg-orange-600 text-white text-md px-3 py-1 rounded-2xl Reg-font">
                                                    Archive
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="bg-gray-100 border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">3
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                Service
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                Description

                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap flex gap-5 items-center">
                                                <button
                                                    class="bg-green-600 text-white text-md px-3 py-1 rounded-2xl Reg-font">
                                                    Edit
                                                </button>
                                                <button
                                                    class="bg-orange-600 text-white text-md px-3 py-1 rounded-2xl Reg-font">
                                                    Archive
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="bg-white border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">4
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                Service
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                Description
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap flex gap-5 items-center">
                                                <button
                                                    class="bg-green-600 text-white text-md px-3 py-1 rounded-2xl Reg-font">
                                                    Edit
                                                </button>
                                                <button
                                                    class="bg-orange-600 text-white text-md px-3 py-1 rounded-2xl Reg-font">
                                                    Archive
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="bg-gray-100 border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">5
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                Service
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                Description
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap flex gap-5 items-center">
                                                <button
                                                    class="bg-green-600 text-white text-md px-3 py-1 rounded-2xl Reg-font">
                                                    Edit
                                                </button>
                                                <button
                                                    class="bg-orange-600 text-white text-md px-3 py-1 rounded-2xl Reg-font">
                                                    Archive
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.footerAdmin')
{{-- 
    
     <div class="flex gap-1 shadow-md p-2 min-w-max">
                    <div class="flex flex-wrap justify-evenly gap-2 ">
                        <div class="bg-yellow-400 p-[10px] flex justify-start items-center rounded-lg w-44 ">
                            <p class="text-md capitalize SemiB-font">Title Service 1</p>
                         
                        </div>
                        <div>
                            <div class="  text-[15px] tracking-wide font-bold p-[10px]">
                                <x-signal />
                            </div>
                        </div>
                    </div>
                    <button type="button"
                        class=" p-[10px] bg-green-500 rounded-md m-2 text-lg Reg-font tracking-wide active:bg-green-600">
                        Edit
                    </button>
                    <button type="button"
                        class=" p-[10px] bg-orange-500 rounded-md m-2 text-lg Reg-font tracking-wide active:bg-orange-600">
                        Archive
                    </button>
                </div>
                <div class="flex gap-1 shadow-md p-2 min-w-max">
                    <div class="flex flex-wrap justify-evenly gap-2 ">
                        <div class="bg-yellow-400 p-[10px] flex justify-start items-center rounded-lg w-44 ">
                            <p class="text-md capitalize SemiB-font">Title Service 1</p>
                           
                        </div>
                        <div>
                            <div class="  text-[15px] tracking-wide font-bold p-[10px]">
                                <x-signal />
                            </div>
                        </div>
                    </div>
                    <button type="button"
                        class=" p-[10px] bg-green-500 rounded-md m-2 text-lg Reg-font tracking-wide active:bg-green-600">
                        Edit
                    </button>
                    <button type="button"
                        class=" p-[10px] bg-orange-500 rounded-md m-2 text-lg Reg-font tracking-wide active:bg-orange-600">
                        Archive
                    </button>
                </div>
                <div class="flex gap-1 shadow-md p-2 min-w-max">
                    <div class="flex flex-wrap justify-evenly gap-2 ">
                        <div class="bg-yellow-400 p-[10px] flex justify-start items-center rounded-lg w-44 ">
                            <p class="text-md capitalize SemiB-font">Title Service 1</p>
                           
                        </div>
                        <div>
                            <div class="  text-[15px] tracking-wide font-bold p-[10px]">
                                <x-signal />
                            </div>
                        </div>
                    </div>
                    <button type="button"
                        class=" p-[10px] bg-green-500 rounded-md m-2 text-lg Reg-font tracking-wide active:bg-green-600">
                        Edit
                    </button>
                    <button type="button"
                        class=" p-[10px] bg-orange-500 rounded-md m-2 text-lg Reg-font tracking-wide active:bg-orange-600">
                        Archive
                    </button>
                </div>
                <div class="flex gap-1 shadow-md p-2 min-w-max">
                    <div class="flex flex-wrap justify-evenly gap-2 ">
                        <div class="bg-yellow-400 p-[10px] flex justify-start items-center rounded-lg w-44 ">
                            <p class="text-md capitalize SemiB-font">Title Service 1</p>
                          
                        </div>
                        <div>
                            <div class="  text-[15px] tracking-wide font-bold p-[10px]">
                                <x-signal />
                            </div>
                        </div>
                    </div>
                    <button type="button"
                        class=" p-[10px] bg-green-500 rounded-md m-2 text-lg Reg-font tracking-wide active:bg-green-600">
                        Edit
                    </button>
                    <button type="button"
                        class=" p-[10px] bg-orange-500 rounded-md m-2 text-lg Reg-font tracking-wide active:bg-orange-600">
                        Archive
                    </button>
                </div>
                <div class="flex gap-1 shadow-md p-2 min-w-max">
                    <div class="flex flex-wrap justify-evenly gap-2 ">
                        <div class="bg-yellow-400 p-[10px] flex justify-start items-center rounded-lg w-44 ">
                            <p class="text-md capitalize SemiB-font">Title Service 1</p>
                           
                        </div>
                        <div>
                            <div class="  text-[15px] tracking-wide font-bold p-[10px]">
                                <x-signal />
                            </div>
                        </div>
                    </div>
                    <button type="button"
                        class=" p-[10px] bg-green-500 rounded-md m-2 text-lg Reg-font tracking-wide active:bg-green-600">
                        Edit
                    </button>
                    <button type="button"
                        class=" p-[10px] bg-orange-500 rounded-md m-2 text-lg Reg-font tracking-wide active:bg-orange-600">
                        Archive
                    </button>
                </div>
    --}}
