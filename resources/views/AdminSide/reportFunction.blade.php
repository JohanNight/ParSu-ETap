@include('partials.headerAdmin')
<div class="flex flex-col h-screen bg-gray-100">
    <!-- Top navigation bar -->
    <x-NavigationTop />

    <!-- Main content-->
    <div class="flex-1 flex flex-wrap">
        <!-- Navigation sidebar (hidden on small devices) -->
        <x-NavigationLeft />
        <div class="flex-1 p-4 w-full md:w-1/2 bg-gray-200 min-h-screen">
            <!-- First container  -->
            <!-- Section 1 - Section of Survey Report -->
            <div class="mt-8 bg-white p-4 shadow rounded-lg">
                <h2 class="text-gray-500 text-xl SemiB-font pb-4 capitalize">Survey</h2>
                <div class="my-1"></div> <!-- Separation space -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <!-- Line with gradient -->
                <div class="w-full h-96 overflow-y-scroll rounded p-2">
                    <div class="border border-gray-600 flex justify-evenly shadow-md ">
                        <div class="p-4 ">
                            <h1 class="text-lg Bold-font capitalize">
                                Survey 1
                            </h1>
                            <p class=" text-sm Reg-font ">
                                Description:: Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis placeat
                                reiciendis dicta
                            </p>
                        </div>
                        <div class="p-4 flex justify-evenly items-center gap-4">
                            <a href="#" class="text-[18px] Reg-font text-green-500">Edit</a>
                            <a href="#" class="text-[18px] Reg-font text-blue-700">Assess</a>
                            <a href="#" class="text-[18px] Reg-font text-red-600">Delete</a>
                        </div>
                    </div>
                    <div class="border border-gray-600 flex justify-evenly shadow-md mt-2">
                        <div class="p-4 ">
                            <h1 class="text-lg Bold-font capitalize">
                                Survey 2
                            </h1>
                            <p class=" text-sm Reg-font ">
                                Description:: Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis placeat
                                reiciendis dicta
                            </p>
                        </div>
                        <div class="p-4 flex justify-evenly items-center gap-4">
                            <a href="#" class="text-[18px] Reg-font text-green-500">Edit</a>
                            <a href="#" class="text-[18px] Reg-font text-blue-700">Assess</a>
                            <a href="#" class="text-[18px] Reg-font text-red-600">Delete</a>
                        </div>
                    </div>
                    <div class="border border-gray-600 flex justify-evenly shadow-md mt-2">
                        <div class="p-4 ">
                            <h1 class="text-lg Bold-font capitalize">
                                Survey3
                            </h1>
                            <p class=" text-sm Reg-font ">
                                Description:: Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis placeat
                                reiciendis dicta
                            </p>
                        </div>
                        <div class="p-4 flex justify-evenly items-center gap-4">
                            <a href="#" class="text-[18px] Reg-font text-green-500">Edit</a>
                            <a href="#" class="text-[18px] Reg-font text-blue-700">Assess</a>
                            <a href="#" class="text-[18px] Reg-font text-red-600">Delete</a>
                        </div>
                    </div>
                    <div class="border border-gray-600 flex justify-evenly shadow-md mt-2">
                        <div class="p-4 ">
                            <h1 class="text-lg Bold-font capitalize">
                                Survey 4
                            </h1>
                            <p class=" text-sm Reg-font ">
                                Description:: Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis placeat
                                reiciendis dicta
                            </p>
                        </div>
                        <div class="p-4 flex justify-evenly items-center gap-4">
                            <a href="#" class="text-[18px] Reg-font text-green-500">Edit</a>
                            <a href="#" class="text-[18px] Reg-font text-blue-700">Assess</a>
                            <a href="#" class="text-[18px] Reg-font text-red-600">Delete</a>
                        </div>
                    </div>

                </div>

            </div>
            <!-- Second container  -->
            <!-- Section 2 - Section of Viewed Service -->
            <div class="mt-8 bg-white p-4 shadow rounded-lg">
                <h2 class="text-gray-500 text-xl SemiB-font pb-4 capitalize">Service</h2>
                <div class="my-1"></div> <!-- Separation space -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <!-- Line with gradient -->
                <div class="w-full h-96 overflow-y-scroll rounded p-2">
                    <div class="border border-gray-600 flex justify-evenly shadow-md ">
                        <div class="p-4 ">
                            <h1 class="text-lg Bold-font capitalize">
                                Service 1
                            </h1>
                            <p class=" text-sm Reg-font ">
                                Description:: Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis placeat
                                reiciendis dicta
                            </p>
                        </div>
                        <div class="p-4 flex justify-evenly items-center gap-4">
                            <a href="#" class="text-[18px] Reg-font text-green-500">Edit</a>
                            <a href="#" class="text-[18px] Reg-font text-blue-700">Assess</a>
                        </div>
                    </div>
                    <div class="border border-gray-600 flex justify-evenly shadow-md mt-2 ">
                        <div class="p-4 ">
                            <h1 class="text-lg Bold-font capitalize">
                                Service 2
                            </h1>
                            <p class=" text-sm Reg-font ">
                                Description:: Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis placeat
                                reiciendis dicta
                            </p>
                        </div>
                        <div class="p-4 flex justify-evenly items-center gap-4">
                            <a href="#" class="text-[18px] Reg-font text-green-500">Edit</a>
                            <a href="#" class="text-[18px] Reg-font text-blue-700">Assess</a>
                        </div>
                    </div>
                    <div class="border border-gray-600 flex justify-evenly shadow-md mt-2 ">
                        <div class="p-4 ">
                            <h1 class="text-lg Bold-font capitalize">
                                Service 3
                            </h1>
                            <p class=" text-sm Reg-font ">
                                Description:: Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis placeat
                                reiciendis dicta
                            </p>
                        </div>
                        <div class="p-4 flex justify-evenly items-center gap-4">
                            <a href="#" class="text-[18px] Reg-font text-green-500">Edit</a>
                            <a href="#" class="text-[18px] Reg-font text-blue-700">Assess</a>
                        </div>
                    </div>
                    <div class="border border-gray-600 flex justify-evenly shadow-md mt-2 ">
                        <div class="p-4 ">
                            <h1 class="text-lg Bold-font capitalize">
                                Service 4
                            </h1>
                            <p class=" text-sm Reg-font ">
                                Description:: Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis placeat
                                reiciendis dicta
                            </p>
                        </div>
                        <div class="p-4 flex justify-evenly items-center gap-4">
                            <a href="#" class="text-[18px] Reg-font text-green-500">Edit</a>
                            <a href="#" class="text-[18px] Reg-font text-blue-700">Assess</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@include('partials.footerAdmin')
