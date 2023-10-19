@include('partials.headerAdmin')

<div class="flex flex-col min-h-screen bg-gray-100">
    <!-- Top navigation bar -->
    <x-NavigationTop />
    <!-- Main content-->
    <div class="flex-1 flex flex-wrap">
        <x-messages />
        <!-- Navigation sidebar (hidden on small devices) -->
        <x-NavigationLeft />
        <!--Main Content Area-->
        <div class="flex-1 w-full md:w-96 p-5 bg-gray-200 min-h-screen">

            <div class="heading text-center Bold-font text-2xl m-5 text-gray-800">Survey Question Storage</div>
            <!-- component1 -->
            <div
                class=" mx-auto w-full overflow-y-scroll text-gray-800 border border-gray-300 bg-white p-1 shadow-xl mb-6">
                <div class="flex flex-col gap-5">
                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5 h-96">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="flex justify-center border-b-2 border-b-gray-300 my-2">
                                <h3 class="text-lg leading-6 Med-font text-gray-900">Citizen Charter Questions</h3>
                            </div>
                            <div class="overflow-hidden flex flex-col gap-5">
                                <!--table number 1-->
                                <div>
                                    <table class="min-w-full h-28 border-2 border-gray-200 overflow-y-auto ">
                                        <thead class="bg-white border-b text-center">
                                            <tr>
                                                <th scope="col"
                                                    class="text-sm SemiB-font text-gray-900 px-6 py-4 text-left">
                                                    Citizen Charter Title Number
                                                </th>
                                                <th scope="col"
                                                    class="text-sm SemiB-font text-gray-900 px-6 py-4 text-left">
                                                    Site
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ccInstruction as $Instruction)
                                                <tr class="bg-gray-100 border-b">
                                                    <td class="  px-6 py-1 whitespace-nowrap ">
                                                        <textarea name="" class="w-full h-16 p-2 text-xs  Reg-font text-gray-900 " readonly> {{ $Instruction->instruction }}</textarea>

                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap flex justify-evenly items-center">
                                                        <a href="/indexAdmin/edit/ccInsruction/{{ $Instruction->id }}"
                                                            class="bg-green-600 text-white text-sm px-3 py-1 rounded-2xl Reg-font">
                                                            Edit
                                                        </a>
                                                        <form
                                                            action="/indexAdmin/delete/ccInsruction/{{ $Instruction->id }}"
                                                            method="POST">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit"
                                                                class="bg-red-600 text-white text-sm px-3 py-1 rounded-2xl Reg-font">
                                                                Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!--table number 2-->
                                <div>
                                    <table class="min-w-full border-2 border-gray-200 ">
                                        <thead class="bg-white border-b text-center">
                                            <tr>
                                                <th scope="col"
                                                    class="text-sm SemiB-font text-gray-900 px-6 py-4 text-left">
                                                    Citizen Charter Question Survey Number
                                                </th>
                                                <th scope="col"
                                                    class="text-sm SemiB-font text-gray-900 px-6 py-4 text-left">
                                                    Site
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ccQuestion as $Question)
                                                <tr class="bg-gray-100 border-b">
                                                    <td
                                                        class="text-sm text-gray-900 Reg-font px-6 py-4 whitespace-nowrap ">
                                                        <textarea name="" id="" class="w-full h-16 p-2 text-xs  Reg-font text-gray-900 focus:outline-none"
                                                            readonly>{{ $Question->description }}</textarea>

                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap flex justify-evenly  items-center">
                                                        <a href="/indexAdmin/edit/ccQuestion/{{ $Question->id }}"
                                                            class="bg-green-600 text-white text-sm px-3 py-1 rounded-2xl Reg-font">
                                                            Edit
                                                        </a>
                                                        <form action="/indexAdmin/delete/ccQuestion/{{ $Question->id }}"
                                                            method="POST">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit"
                                                                class="bg-red-600 text-white text-sm px-3 py-1 rounded-2xl Reg-font">
                                                                Delete</button>
                                                        </form>
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
            <!-- component 2 -->
            <div
                class=" mx-auto w-full overflow-y-scroll text-gray-800 border border-gray-300 bg-white p-1 shadow-xl mb-6">
                <!-- component 1 -->
                <div class="flex flex-col gap-5">
                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5 h-96">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="flex justify-center border-b-2 border-b-gray-300 my-2">
                                <h3 class="text-lg leading-6 Med-font text-gray-900">Citizen Charter Questions</h3>
                            </div>
                            <div class="overflow-hidden flex flex-col gap-5">
                                <!--table number 1-->
                                <div>
                                    <table class="min-w-full h-28 border-2 border-gray-200 overflow-y-auto ">
                                        <thead class="bg-white border-b text-center">
                                            <tr>
                                                <th scope="col"
                                                    class="text-sm SemiB-font text-gray-900 px-6 py-4 text-left">
                                                    Citizen Charter Title Number
                                                </th>
                                                <th scope="col"
                                                    class="text-sm SemiB-font text-gray-900 px-6 py-4 text-left">
                                                    Site
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ccInstruction as $Instruction)
                                                <tr class="bg-gray-100 border-b">
                                                    <td
                                                        class="text-sm text-gray-900 Reg-font px-6 py-4 whitespace-nowrap ">
                                                        {{ $Instruction->id }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap flex gap-5 items-center">
                                                        <a href="/indexAdmin/editService/{{ $Instruction->id }}"
                                                            class="bg-green-600 text-white text-sm px-3 py-1 rounded-2xl Reg-font">
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!--table number 2-->
                                <div>
                                    <table class="min-w-full border-2 border-gray-200 ">
                                        <thead class="bg-white border-b text-center">
                                            <tr>
                                                <th scope="col"
                                                    class="text-sm SemiB-font text-gray-900 px-6 py-4 text-left">
                                                    Citizen Charter Question Survey Number
                                                </th>
                                                <th scope="col"
                                                    class="text-sm SemiB-font text-gray-900 px-6 py-4 text-left">
                                                    Site
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ccQuestion as $Question)
                                                <tr class="bg-gray-100 border-b">
                                                    <td
                                                        class="text-sm text-gray-900 Reg-font px-6 py-4 whitespace-nowrap ">
                                                        {{ $Question->id }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap flex gap-5 items-center">
                                                        <a href="/indexAdmin/editService/{{ $Question->id }}"
                                                            class="bg-green-600 text-white text-sm px-3 py-1 rounded-2xl Reg-font">
                                                            Edit
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
        </div>
    </div>
</div>

@include('partials.footerAdmin')
