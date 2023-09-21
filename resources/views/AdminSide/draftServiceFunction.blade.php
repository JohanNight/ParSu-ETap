@include('partials.headerAdmin')

<div class="flex flex-col h-screen bg-gray-100">
    <!-- Top navigation bar -->
    <x-NavigationTop />
    <!-- Main content-->
    <div class="flex-1 flex flex-wrap">
        <!-- Navigation sidebar (hidden on small devices) -->
        <x-NavigationLeft />
        <!--Main Content Area-->
        <div class="flex-1 w-full md:w-1/2 bg-gray-200 min-h-screen ">
            <!-- component -->
            <div class="heading text-center Bold-font text-2xl m-5 text-gray-800">Draft Service</div>
            <div
                class="editor mx-auto w-10/12 min-h-screen overflow-y-scroll flex flex-col text-gray-800 border border-gray-300 bg-white p-4 shadow-xl max-w-2xl rounded-lg mb-6">
                <div class="flex gap-1 shadow-md p-2 min-w-max justify-between gap-2">
                    <div class="flex flex-wrap  ">
                        <div class="bg-yellow-400 p-[10px] flex justify-start items-center rounded-lg w-44 ">
                            <p class="text-md capitalize SemiB-font">Title Service 1</p>
                            {{-- title of the service should be here --}}
                        </div>
                    </div>
                    <div class="flex flex-wrap  ">
                        <button type="button"
                            class=" p-[10px] bg-green-500 rounded-md m-2 text-lg Reg-font tracking-wide active:bg-green-600">
                            Edit
                        </button>
                        <button type="button"
                            class=" p-[10px] bg-orange-500 rounded-md m-2 text-lg Reg-font tracking-wide active:bg-orange-600">
                            Archive
                        </button>
                    </div>
                </div>
                <div class="flex gap-1 shadow-md p-2 min-w-max justify-between gap-2">
                    <div class="flex flex-wrap  ">
                        <div class="bg-yellow-400 p-[10px] flex justify-start items-center rounded-lg w-44 ">
                            <p class="text-md capitalize SemiB-font">Title Service 1</p>
                            {{-- title of the service should be here --}}
                        </div>
                    </div>
                    <div class="flex flex-wrap ">
                        <button type="button"
                            class=" p-[10px] bg-green-500 rounded-md m-2 text-lg Reg-font tracking-wide active:bg-green-600">
                            Edit
                        </button>
                        <button type="button"
                            class=" p-[10px] bg-orange-500 rounded-md m-2 text-lg Reg-font tracking-wide active:bg-orange-600">
                            Archive
                        </button>
                    </div>
                </div>
                <div class="flex gap-1 shadow-md p-2 min-w-max justify-between gap-2">
                    <div class="flex flex-wrap  ">
                        <div class="bg-yellow-400 p-[10px] flex justify-start items-center rounded-lg w-44 ">
                            <p class="text-md capitalize SemiB-font">Title Service 1</p>
                            {{-- title of the service should be here --}}
                        </div>
                    </div>
                    <div class="flex flex-wrap  ">
                        <button type="button"
                            class=" p-[10px] bg-green-500 rounded-md m-2 text-lg Reg-font tracking-wide active:bg-green-600">
                            Edit
                        </button>
                        <button type="button"
                            class=" p-[10px] bg-orange-500 rounded-md m-2 text-lg Reg-font tracking-wide active:bg-orange-600">
                            Archive
                        </button>
                    </div>
                </div>
                <div class="flex gap-1 shadow-md p-2 min-w-max justify-between gap-2">
                    <div class="flex flex-wrap  ">
                        <div class="bg-yellow-400 p-[10px] flex justify-start items-center rounded-lg w-44 ">
                            <p class="text-md capitalize SemiB-font">Title Service 1</p>
                            {{-- title of the service should be here --}}
                        </div>
                    </div>
                    <div class="flex flex-wrap  ">
                        <button type="button"
                            class=" p-[10px] bg-green-500 rounded-md m-2 text-lg Reg-font tracking-wide active:bg-green-600">
                            Edit
                        </button>
                        <button type="button"
                            class=" p-[10px] bg-orange-500 rounded-md m-2 text-lg Reg-font tracking-wide active:bg-orange-600">
                            Archive
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.footerAdmin')
