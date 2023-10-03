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
            <div class="heading text-center Bold-font text-2xl m-5 text-gray-800">New Service</div>
            <form action="">
                <div
                    class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-xl bg-white rounded-md">
                    <div class="flex flex-col gap-2 mt-2 mb-2">
                        <label for="code_Title" class="text-md Reg-font">Code:</label>
                        <input name="code_Title"
                            class="bg-gray-100 border border-gray-300 p-2 mb-4 outline-none Reg-font "
                            spellcheck="false" type="text">
                    </div>
                    <div class="flex flex-col gap-2  mt-2 mb-2 ">
                        <label for="service_Title" class="text-md Reg-font">Title:</label>
                        <input name="service_Title"
                            class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none Reg-font"
                            spellcheck="false" placeholder="Title" type="text">
                    </div>
                    <div class=" mt-2 mb-2 ">
                        <label for="description_service" class="text-md Reg-font">Description:</label>
                        <textarea id="description_service" name="description_service"
                            class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none Reg-font w-full" spellcheck="false"
                            placeholder="Describe everything here"></textarea>
                    </div>
                    <div class="flex justify-evenly">
                        <div class="p-2 w-96">
                            <label for="office_service" class="text-md Reg-font">Office or Division:</label>
                            <select name="office_service" id="office_service"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 text-[16px] Reg-font capitalize">
                                <option value=""></option>
                                @foreach ($officeTypes as $officeType)
                                    <option value="{{ $officeType->officeDescription }}"
                                        class="text-[16px] Reg-font capitalize ">
                                        {{ $officeType->officeAcronym }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="p-2 w-96">
                            <label for="classification" class="text-md Reg-font">Classification:</label>
                            <select name="classification" id="classification"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 text-[16px] Reg-font capitalize">
                                <option value=""></option>

                                <option value="C-2-C Government to Citizen" class="text-[16px] Reg-font capitalize ">
                                    C-2-C Citizen to Citizen
                                </option>
                                <option value="G-2-C Government to Citizen" class="text-[16px] Reg-font capitalize ">
                                    G-2-C Government to Citizen
                                </option>
                                <option value="G-2-C Government to Citizen" class="text-[16px] Reg-font capitalize ">
                                    G-2-C Government to Citizen
                                </option>

                            </select>
                        </div>
                        <div class="p-2 w-96">
                            <label for="transaction_type" class="text-md Reg-font capitalize">Transaction Type:</label>
                            <select name="transaction_type" id="transaction_type"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 text-[16px] Reg-font capitalize">
                                <option value=""></option>

                                <option value=" Simple" class="text-[16px] Reg-font capitalize ">
                                    Simple
                                </option>
                                <option value="Medium" class="text-[16px] Reg-font capitalize ">
                                    Medium
                                </option>
                                <option value="Hard" class="text-[16px] Reg-font capitalize ">
                                    Hard
                                </option>

                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2  mt-2 mb-2 ">
                        <label for="who_avail" class="text-md Reg-font capitalize">Who may Avail:</label>
                        <input name="who_avail" id="who_avail"
                            class=" bg-gray-100 border border-gray-300 p-2 mb-4 outline-none Reg-font"
                            spellcheck="false" placeholder="Who may Avil" type="text">
                    </div>
                    <div class="my-1"></div> <!-- Separation space -->
                    <div class="bg-gray-300 h-px mb-6"></div>
                    <!-- Line with gradient -->
                    <div class="mt-2 mb-3">
                        <p class="text-sm Reg-font text-justify">
                            Note: Checklist of Requirements and Where to Secure input Fields are correspond to each
                            input fields, if the Checklist of Requirements input field number 1 doesn't need an
                            information on Where to Secure just Add in the input Field number 1 of Where to Secure is
                            <span class="text-blue-400">N/A</span>
                        </p>
                    </div>
                    <div class="mt-2 mb-3">
                        <div class="p-1 flex justify-between">
                            <label for="" class="text-md Reg-font">Check List of Requierements:</label>
                            <button type="button" id="addRqr_inpt"
                                class="text-sm Reg-font p-1 bg-green-500 rounded-lg text-white"> Add new
                                Fields</button>
                        </div>
                        <div class="mt-2 mb-3">
                            <div class="flex gap-3 mt-2 mb-2">
                                <input type="text" name="rqr_inpt[1]" id="rqr_inpt[1]"
                                    class="text-[md] w-full Reg-font h-9 border-2 bg-gray-100 p-2 focus:outline-none">
                                <button type="button" id="dltRqr_inpt[1]"
                                    class="text-sm Reg-font p-1 bg-red-500 rounded-lg text-white"> Delete</button>
                            </div>
                            <div class="flex gap-3 mt-2 mb-2">
                                <input type="text" name="rqr_inpt[2]" id="rqr_inpt[2]"
                                    class="text-[md] w-full Reg-font h-9 border-2 bg-gray-100 p-2 focus:outline-none">
                                <button type="button" id="dltRqr_inpt[2]"
                                    class="text-sm Reg-font p-1 bg-red-500 rounded-lg text-white"> Delete</button>
                            </div>
                            <div class="flex gap-3 mt-2 mb-2">
                                <input type="text" name="rqr_inpt[3]" id="rqr_inpt[3]"
                                    class="text-[md] w-full Reg-font h-9 border-2 bg-gray-100 p-2 focus:outline-none">
                                <button type="button" id="dltRqr_inpt[3]"
                                    class="text-sm Reg-font p-1 bg-red-500 rounded-lg text-white"> Delete</button>
                            </div>
                        </div>

                    </div>
                    <div>
                        <div class="p-1 flex justify-between">
                            <label for="" class="text-md Reg-font">Where to Secure:</label>
                            <button type="button" id="addWhr_inpt"
                                class="text-sm Reg-font p-1 bg-green-500 rounded-lg text-white"> Add new
                                Fields</button>
                        </div>
                        <div class="mt-2 mb-3">
                            <div class="flex gap-3 mt-2 mb-2">
                                <input type="text" name="whr_inpt[1]" id="whr_inpt[1]"
                                    class="text-[md] w-full Reg-font h-9 border-2 bg-gray-100 p-2 focus:outline-none">
                                <button type="button" id="dltWhr_inpt[1]"
                                    class="text-sm Reg-font p-1 bg-red-500 rounded-lg text-white"> Delete</button>
                            </div>
                            <div class="flex gap-3 mt-2 mb-2">
                                <input type="text" name="whr_inpt[2]" id="whr_inpt[2]"
                                    class="text-[md] w-full Reg-font h-9 border-2 bg-gray-100 p-2 focus:outline-none">
                                <button type="button" id="dltWhr_inpt[2]"
                                    class="text-sm Reg-font p-1 bg-red-500 rounded-lg text-white"> Delete</button>
                            </div>
                            <div class="flex gap-3 mt-2 mb-2">
                                <input type="text" name="whr_inpt[3]" id="whr_inpt[3]"
                                    class="text-[md] w-full Reg-font h-9 border-2 bg-gray-100 p-2 focus:outline-none">
                                <button type="button" id="dltWhr_inpt[3]"
                                    class="text-sm Reg-font p-1 bg-red-500 rounded-lg text-white"> Delete</button>
                            </div>
                        </div>

                    </div>


                    <!-- icons -->
                    <div class="icons flex text-gray-500 m-2">
                        <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                        </svg>

                    </div>
                    <!-- buttons -->
                    <div class="buttons flex">
                        <div
                            class="btn border border-indigo-500 p-1 px-4 SemiB-font cursor-pointer text-gray-200 ml-2 bg-indigo-500 rounded">
                            <button type="submit">Upload</button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- <style>
    /* Define custom CSS styles for the table */
    .custom-table {
        border-collapse: collapse;
        width: 100%;
        resize: both;
        overflow: auto;
    }

    .custom-table th,
    .custom-table td {
        border: 1px solid #000;
        padding: 2px;
    }

    .custom-table th {
        background: #f7efef;
        width: 30%;
        height: 30px;
        padding: 2px;
    }

    .custom-table td {
        width: 50px;
        height: 50px;
    }
</style>
<div class="block p-1">
    <div class="flex justify-between mt-2 mb-2">
        <button id="create-table" type="button"
            class="bg-blue-500 text-white px-2 py-1 rounded">Create
            Table</button>

    </div>
    <!-- tables -->
    <div class="p-1" id="tbl_set[1]">
        <div class="flex justify-between">
            <div class="p-4 flex gap-3">
                <button id="add-row[1]" type="button"
                    class="bg-green-500 text-white px-2 py-1 rounded">Add
                    Row</button>
                <button id="delete-row[1]" type="button"
                    class="bg-red-500 text-white px-2 py-1 rounded">Delete
                    Row</button>
                <button id="add-column[1]" type="button"
                    class="bg-green-500 text-white px-2 py-1 rounded">Add
                    Column</button>
                <button id="delete-column[1]" type="button"
                    class="bg-red-500 text-white px-2 py-1 rounded">Delete
                    Column</button>
            </div>
            <div class="p-4">
                <button id="delete-table" type="button"
                    class="bg-red-500 text-white px-2 py-1 rounded">Delete
                    Table</button>
            </div>
        </div>


        <div id="table-container[1]"
            class="mt-4 w-full text-[15px] Reg-font bg-gray-100 rounded-lg border-2 p-2">
            <!-- The table will be inserted here -->
        </div>
    </div>
</div> --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> --}}
{{-- <script src="{{ mix('resources/js/functionTables.js') }}"></script> --}}
@include('partials.footerAdmin')
