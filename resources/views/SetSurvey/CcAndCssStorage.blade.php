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
            <!-- Citizen Charter Questions -->
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
            <!-- Client Satisafaction Survey Instructioin -->
            <div
                class=" mx-auto w-full overflow-y-scroll text-gray-800 border border-gray-300 bg-white p-1 shadow-xl mb-6">
                <!-- component 1 -->
                <div class="flex justify-center border-b-2 border-b-gray-300 my-2">
                    <h3 class="text-lg leading-6 Med-font text-gray-900">Client Satisfaction Survey
                        Instruction</h3>
                </div>
                <div class="flex flex-col gap-5">
                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5 h-96">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <!--table number 1-->
                            <div>
                                <table class="min-w-full border-2 border-gray-200 ">
                                    <thead class="bg-white border-b text-center">
                                        <tr>
                                            <th scope="col"
                                                class="text-sm SemiB-font text-gray-900 px-6 py-4 text-left">
                                                Client Satisfaction Survey Instruction
                                            </th>
                                            <th scope="col"
                                                class="text-sm SemiB-font text-gray-900 px-6 py-4 text-left">
                                                Page
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($SrvyInstruction as $instruction)
                                            <tr class="bg-gray-100 border-b">
                                                <td class="text-sm text-gray-900 Reg-font px-6 py-4 whitespace-nowrap ">
                                                    <textarea name="" id="" class="w-full h-16 p-2 text-xs  Reg-font text-gray-900 focus:outline-none"
                                                        readonly>{{ $instruction->instruction }}</textarea>

                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap flex justify-evenly  items-center">
                                                    <a href="/indexAdmin/edit/Css-Instruction/{{ $instruction->id }}"
                                                        class="bg-green-600 text-white text-sm px-3 py-1 rounded-2xl Reg-font">
                                                        Edit
                                                    </a>
                                                    <form
                                                        action="/indexAdmin/delete/Css-Instruction/{{ $instruction->id }}"
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

            <!-- Client Satisafaction Survey Question -->
            <div
                class=" mx-auto w-full overflow-y-scroll text-gray-800 border border-gray-300 bg-white p-1 shadow-xl mb-6">
                <!-- component 1 -->
                <div class="flex justify-center border-b-2 border-b-gray-300 my-2">
                    <h3 class="text-lg leading-6 Med-font text-gray-900">Client Satisfaction Survey
                        Questions</h3>
                </div>
                <div class="flex flex-col gap-5">
                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5 h-96">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <!--table number 2-->
                            <table class="min-w-full border-2 border-gray-200 ">
                                <thead class="bg-white border-b text-center">
                                    <tr>
                                        <th scope="col" class="text-sm SemiB-font text-gray-900 px-6 py-4 text-left">
                                            Client Satisfaction Survey Questions
                                        </th>
                                        <th scope="col" class="text-sm SemiB-font text-gray-900 px-6 py-4 text-left">
                                            Page
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($SrvyQuestion as $index => $srvyQuestion)
                                        <tr class="bg-gray-100 border-b">
                                            <td class="text-xs text-gray-900 Reg-font px-6 py-4 whitespace-nowrap ">
                                                {{ $srvyQuestion->questions }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap flex justify-evenly gap-4  items-center">
                                                <a href="/indexAdmin/edit/Css-Question/{{ $srvyQuestion->id }}"
                                                    class="bg-green-600 text-white text-sm px-3 py-1 rounded-2xl Reg-font">
                                                    Edit
                                                </a>
                                                <form action="/indexAdmin/delete/ccQuestion/{{ $srvyQuestion->id }}"
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
            <!-- Client Satisafaction Survey Comment -->
            <div
                class=" mx-auto w-full overflow-y-scroll text-gray-800 border border-gray-300 bg-white p-1 shadow-xl mb-6">
                <!-- component 1 -->
                <div class="flex flex-col gap-5">
                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5 h-96">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="flex justify-center border-b-2 border-b-gray-300 my-2">
                                <h3 class="text-lg leading-6 Med-font text-gray-900">Client Satisfaction Survey
                                    Comment</h3>
                            </div>
                            <!--table number 1-->
                            <div>
                                <table class="min-w-full border-2 border-gray-200 ">
                                    <thead class="bg-white border-b text-center">
                                        <tr>
                                            <th scope="col"
                                                class="text-sm SemiB-font text-gray-900 px-6 py-4 text-left">
                                                Client Satisfaction Survey Instruction
                                            </th>
                                            <th scope="col"
                                                class="text-sm SemiB-font text-gray-900 px-6 py-4 text-left">
                                                Page
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($SrvyComment as $comment)
                                            <tr class="bg-gray-100 border-b">
                                                <td
                                                    class="text-xs text-gray-900 Reg-font px-6 py-4 whitespace-nowrap ">
                                                    {{ $comment->comment }}

                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap flex justify-evenly  items-center">
                                                    <a href="/indexAdmin/edit/Css-Question/{{ $comment->id }}"
                                                        class="bg-green-600 text-white text-sm px-3 py-1 rounded-2xl Reg-font">
                                                        Edit
                                                    </a>
                                                    <form action="/indexAdmin/delete/ccQuestion/{{ $comment->id }}"
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
    </div>
</div>
</div>

@include('partials.footerAdmin')
