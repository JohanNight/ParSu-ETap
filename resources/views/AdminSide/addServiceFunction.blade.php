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
            <form action="" method="POST">
                @csrf
                <div
                    class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-xl bg-white rounded-md">
                    <div class="flex flex-col gap-2 mt-2 mb-2">
                        <label for="code_Title" class="text-md Reg-font">Code:</label>
                        <input name="code_Title"
                            class="bg-gray-100 border border-gray-300 p-2 mb-4 outline-none Reg-font "
                            spellcheck="false" type="text" autocomplete="off">
                        @error('code_Title')
                            <p class="text-red-400 text-sm p-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-2  mt-2 mb-2 ">
                        <label for="service_Title" class="text-md Reg-font">Title:</label>
                        <input name="service_Title"
                            class="bg-gray-100 border border-gray-300 p-2 mb-4 outline-none Reg-font" spellcheck="false"
                            placeholder="Title" type="text" autocomplete="off">
                        @error('service_Title')
                            <p class="text-red-400 text-sm p-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class=" mt-2 mb-2 ">
                        <label for="description_service" class="text-md Reg-font">Description:</label>
                        <textarea id="description_service" name="description_service"
                            class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none Reg-font w-full" spellcheck="false"
                            placeholder="Describe everything here"></textarea>
                        @error('description_service')
                            <p class="text-red-400 text-sm p-1">
                                {{ $message }}
                            </p>
                        @enderror
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
                            @error('office_service')
                                <p class="text-red-400 text-sm p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="p-2 w-96">
                            <label for="classification_service" class="text-md Reg-font">Classification:</label>
                            <select name="classification_service" id="classification_service"
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
                            @error('classification_service')
                                <p class="text-red-400 text-sm p-1">
                                    {{ $message }}
                                </p>
                            @enderror
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
                            @error('transaction_type')
                                <p class="text-red-400 text-sm p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col gap-2  mt-2 mb-2 ">
                        <label for="who_avail" class="text-md Reg-font capitalize">Who may Avail:</label>
                        <input name="who_avail" id="who_avail"
                            class=" bg-gray-100 border border-gray-300 p-2 mb-4 outline-none Reg-font"
                            spellcheck="false" placeholder="Who may Avail" type="text" autocomplete="off">
                        @error('who_avail')
                            <p class="text-red-400 text-sm p-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="my-1"></div> <!-- Separation space -->
                    <div class="bg-gray-300 h-px mb-6"></div>
                    <!-- Line with gradient -->
                    <div>
                        <div class="mt-2 mb-3">
                            <p class="text-sm Reg-font text-justify">
                                Note: Checklist of Requirements and Where to Secure input Fields are correspond to each
                                input fields, if the Checklist of Requirements input field number 1 doesn't need an
                                information on Where to Secure just Add in the input Field number 1 of Where to Secure
                                is
                                <span class="text-blue-400">N/A</span>
                            </p>
                        </div>
                        <div class="mt-2 mb-3">
                            <div class="p-1 flex justify-between">
                                <label for="rqr_inpt[]" class="text-md Reg-font">Check List of Requirements:</label>
                                <button type="button" id="addRqr_inpt"
                                    class="text-sm Reg-font p-1 bg-green-500 rounded-lg text-white"> Add new
                                    Fields</button>
                            </div>
                            <div class="mt-2 mb-3" id="requirementsContainer">
                                <div class="flex gap-3 mt-2 mb-2">
                                    <input type="text" name="rqr_inpt[1]" id="rqr_inpt[1]"
                                        class="text-sm w-full Reg-font h-9 border-2 bg-gray-100 p-2 focus:outline-none"
                                        autocomplete="off">
                                    <button type="button" id="dltRqr_inpt[1]"
                                        class="text-sm Reg-font p-1 bg-red-500 rounded-lg text-white"> Delete</button>
                                </div>
                                {{-- <div class="flex gap-3 mt-2 mb-2">
                                    <input type="text" name="rqr_inpt[2]" id="rqr_inpt[2]"
                                        class="text-sm w-full Reg-font h-9 border-2 bg-gray-100 p-2 focus:outline-none"
                                        autocomplete="off">
                                    <button type="button" id="dltRqr_inpt[2]"
                                        class="text-sm Reg-font p-1 bg-red-500 rounded-lg text-white"> Delete</button>
                                </div>
                                <div class="flex gap-3 mt-2 mb-2">
                                    <input type="text" name="rqr_inpt[3]" id="rqr_inpt[3]"
                                        class="text-sm w-full Reg-font h-9 border-2 bg-gray-100 p-2 focus:outline-none"
                                        autocomplete="off">
                                    <button type="button" id="dltRqr_inpt[3]"
                                        class="text-sm Reg-font p-1 bg-red-500 rounded-lg text-white"> Delete</button>
                                </div> --}}
                            </div>

                        </div>
                        <div>
                            <div class="p-1 flex justify-between">
                                <label for="whr_inpt[]" class="text-md Reg-font">Where to Secure:</label>
                                <button type="button" id="addWhr_inpt"
                                    class="text-sm Reg-font p-1 bg-green-500 rounded-lg text-white"> Add new
                                    Fields</button>
                            </div>
                            <div class="mt-2 mb-3" id="whr_secure">
                                <div class="flex gap-3 mt-2 mb-2">
                                    <input type="text" name="whr_inpt[1]" id="whr_inpt[1]"
                                        class="text-sm w-full Reg-font h-9 border-2 bg-gray-100 p-2 focus:outline-none"
                                        autocomplete="off">
                                    <button type="button" id="dltWhr_inpt[1]"
                                        class="text-sm Reg-font p-1 bg-red-500 rounded-lg text-white"> Delete</button>
                                </div>
                                {{-- <div class="flex gap-3 mt-2 mb-2">
                                    <input type="text" name="whr_inpt[2]" id="whr_inpt[2]"
                                        class="text-sm w-full Reg-font h-9 border-2 bg-gray-100 p-2 focus:outline-none"
                                        autocomplete="off">
                                    <button type="button" id="dltWhr_inpt[2]"
                                        class="text-sm Reg-font p-1 bg-red-500 rounded-lg text-white"> Delete</button>
                                </div>
                                <div class="flex gap-3 mt-2 mb-2">
                                    <input type="text" name="whr_inpt[3]" id="whr_inpt[3]"
                                        class="text-sm w-full Reg-font h-9 border-2 bg-gray-100 p-2 focus:outline-none"
                                        autocomplete="off">
                                    <button type="button" id="dltWhr_inpt[3]"
                                        class="text-sm Reg-font p-1 bg-red-500 rounded-lg text-white"> Delete</button>
                                </div> --}}
                            </div>

                        </div>
                    </div>




                    <div class="my-1"></div> <!-- Separation space -->
                    <div class="bg-gray-300 h-px mb-6"></div>
                    <!-- Line with gradient -->
                    <div class="p-2">
                        <div class="mt-2 mb-3">
                            <p class="text-sm Reg-font text-justify">
                                Note: Checklist of Requirements and Where to Secure input Fields are correspond to each
                                input fields, if the Checklist of Requirements input field number 1 doesn't need an
                                information on Where to Secure just Add in the input Field number 1 of Where to Secure
                                is
                                <span class="text-blue-400">N/A</span>
                            </p>
                        </div>
                        <div>
                            <button type="button" id="add_row"
                                class="text-sm Reg-font p-1 border-2 bg-green-600 text-white rounded-lg">
                                Add Row
                            </button>
                            <button type="button" id="dlt_row"
                                class="text-sm Reg-font p-1 border-2 bg-red-600 text-white rounded-lg">
                                Delete Row
                            </button>
                        </div>
                        <div>
                            <table id="table_id" name="table_id"
                                class="w-full text-sm text-left text-gray-500 border-2 border-collapse">
                                <thead class="text-xs Reg-font text-gray-700 uppercase bg-blue-800 text-white">
                                    <th scope="row" class="py-3 px-6 text-center border-2 ">
                                        Client Steps
                                    </th>
                                    <th scope="row" class="py-3 px-6 text-center border-2 ">
                                        Agency Action
                                    </th>
                                    <th scope="row" class="py-3 px-6 text-center border-2 ">
                                        Fees to be Paid
                                    </th>
                                    <th scope="row" class="py-3 px-6 text-center border-2 ">
                                        Processing Time
                                    </th>
                                    <th scope="row" class="py-3 px-6 text-center border-2 ">
                                        Person Responsible
                                    </th>
                                </thead>
                                <tbody>
                                    <tr class=" text-left">
                                        <td class="w-40 h-28 p-1 border-2">
                                            <textarea name="client_steps[]" id="client_steps[]" class="w-full h-full"></textarea>
                                        </td>
                                        <td class="w-40 h-28 p-1 border-2">
                                            <textarea name="agency_action[]" id="agency_action[]" class="w-full h-full"></textarea>
                                        </td>
                                        <td class="w-40 h-28 p-1 border-2">
                                            <textarea name="fees_to_paid[]" id="fees_to_paid[]" class="w-full h-full"></textarea>
                                        </td>
                                        <td class="w-40 h-28 p-1 border-2">
                                            <textarea name="processing_time[]" id="processing_time[]" class="w-full h-full"></textarea>
                                        </td>
                                        <td class="w-40 h-28 p-1 border-2">
                                            <textarea name="person_responsible[]" id="person_responsible[]" class="w-full h-full"></textarea>

                                        </td>
                                    </tr>
                                    <tr class=" text-left">
                                        <td class="w-40 h-28 p-1 border-2">
                                            <textarea name="client_steps[1]" id="client_steps[1]" class="w-full h-full"></textarea>
                                        </td>
                                        <td class="w-40 h-28 p-1 border-2">
                                            <textarea name="agency_action[1]" id="agency_action[1]" class="w-full h-full"></textarea>
                                        </td>
                                        <td class="w-40 h-28 p-1 border-2">
                                            <textarea name="fees_to_paid[1]" id="fees_to_paid[1]" class="w-full h-full"></textarea>
                                        </td>
                                        <td class="w-40 h-28 p-1 border-2">
                                            <textarea name="processing_time[1]" id="processing_time[1]" class="w-full h-full"></textarea>
                                        </td>
                                        <td class="w-40 h-28 p-1 border-2">
                                            <textarea name="person_responsible[1]" id="person_responsible[1]" class="w-full h-full"></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- buttons -->
                    <div class="flex">
                        <div
                            class=" border border-indigo-500 p-1 px-4 SemiB-font cursor-pointer text-gray-200 ml-2 bg-indigo-500 rounded w-full flex justify-center p-4">
                            <button type="submit" class="text-lg uppercase">Upload</button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--for handling the table to be editable-->
<script>
    document.getElementById("add_row").addEventListener("click", function() {
        addRow();
    });

    document.getElementById("dlt_row").addEventListener("click", function() {
        deleteRow();
    });

    function addRow() {
        var table = document.getElementById("table_id");
        var newRow = table.insertRow(-1);

        for (var i = 0; i < 5; i++) {
            var newCell = newRow.insertCell(i);
            newCell.className = "w-40 h-28 p-1 border-2";
            setCellStyles(newCell);
        }
    }

    function deleteRow() {
        var table = document.getElementById("table_id");
        if (table.rows.length > 2) {
            table.deleteRow(-1);
        }
    }

    function setCellStyles(cell) {
        var textarea = document.createElement('textarea');
        textarea.value = cell.innerText;

        textarea.style.width = "100%";
        textarea.style.height = "100%";
        textarea.style.padding = "0";
        textarea.style.border = "none";

        textarea.addEventListener('blur', function() {
            cell.innerText = textarea.value;
        });

        cell.innerText = '';
        cell.appendChild(textarea);
    }

    // Event listener for the table to handle cell editing
    document.getElementById("table_id").addEventListener("click", function(e) {
        var cell = e.target;

        if (cell.tagName === "TD" && cell !== document.activeElement) {
            enableCellEditing(cell);
        }
    });

    // Function to enable cell editing
    function enableCellEditing(cell) {
        var textarea = document.createElement('textarea');
        textarea.value = cell.innerText;

        textarea.style.width = "100%";
        textarea.style.height = "100%";
        textarea.style.padding = "0";
        textarea.style.border = "none";

        textarea.addEventListener('blur', function() {
            cell.innerText = textarea.value;
        });

        cell.innerText = '';
        cell.appendChild(textarea);
        textarea.focus();
    }
</script>


<!--for handling the input fields of where to secure and requirements-->
<script>
    function addField(container, inputCounterName, containerId) {
        const inputCounter = container.getAttribute(inputCounterName);
        const newInput = document.createElement("div");
        newInput.className = "flex gap-3 mt-2 mb-2";
        newInput.innerHTML = `
            <input type="text" name="${containerId}[${inputCounter}]" class="text-sm w-full Reg-font h-9 border-2 bg-gray-100 p-2 focus:outline-none" autocomplete="off">
            <button type="button" class="text-sm Reg-font p-1 bg-red-500 rounded-lg text-white" onclick="removeField(this, '${containerId}')">Delete</button>
        `;

        container.appendChild(newInput);
        container.setAttribute(inputCounterName, parseInt(inputCounter) + 1);
    }

    function removeField(element, containerId) {
        const container = element.parentElement.parentElement;
        container.removeChild(element.parentElement);
    }

    // Event listeners for the "Add new Fields" buttons
    document.getElementById("addRqr_inpt").addEventListener("click", () => addField(document.getElementById(
        "requirementsContainer"), "data-rqr-input-counter", "rqr_inpt"));
    document.getElementById("addWhr_inpt").addEventListener("click", () => addField(document.getElementById(
        "whr_secure"), "data-whr-input-counter", "whr_inpt"));
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--for handling the data-->
<script>
    $(document).ready(function() {
        // Handle form submission
        $('form').on('submit', function(event) {
            event.preventDefault();

            // Gather the data from dynamically generated fields
            var rqrInputs = [];
            var whrInputs = [];

            $('#requirementsContainer input').each(function() {
                rqrInputs.push($(this).val());
            });

            $('#whr_secure input').each(function() {
                whrInputs.push($(this).val());
            });

            // Gather the table data
            var tableData = [];
            $('#table_id tbody tr').each(function() {
                var row = $(this);
                var rowData = {
                    clientSteps: row.find('textarea[name="client_steps[]"]').val(),
                    agencyAction: row.find('textarea[name="agency_action[]"]').val(),
                    feesToBePaid: row.find('textarea[name="fees_to_paid[]"]').val(),
                    processingTime: row.find('textarea[name="processing_time[]"]').val(),
                    personResponsible: row.find('textarea[name="person_responsible[]"]')
                        .val()
                };
                tableData.push(rowData);
            });



            // Send all the data to the server using AJAX
            $.ajax({
                url: 'http://127.0.0.1:8000/indexAdmin/addService'
                data: {
                    _token: $('meta[name="csrf-token"]').attr(
                        'content'), // Include the CSRF token
                    code_Title: $('#code_Title').val(),
                    service_Title: $('#service_Title').val(),
                    description_service: $('#description_service').val(),
                    classification_service: $('#classification_service').val(),
                    transaction_type: $('#transaction_type').val(),
                    who_avail: $('#who_avail').val(),
                    // ... other form fields
                    rqr_inpt: rqrInputs,
                    whr_inpt: whrInputs,
                    table_data: JSON.stringify(tableData) // Convert table data to JSON
                },
                success: function(response) {
                    // Handle the success response or redirect to a success page
                },
                error: function(xhr, status, error) {
                    // Handle errors
                }
            });
        });
    });
</script>

@include('partials.footerAdmin')
