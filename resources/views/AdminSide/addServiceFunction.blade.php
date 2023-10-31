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
                            <label for="serviceType" class="text-md Reg-font">Service Type:</label>
                            <select name="serviceType" id="serviceType"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 text-[16px] Reg-font capitalize">
                                <option value=""></option>
                                @foreach ($ServiceType as $servicetype)
                                    <option value="{{ $servicetype->services }}"
                                        class="text-[16px] Reg-font capitalize ">
                                        {{ $servicetype->services }}</option>
                                @endforeach
                            </select>
                            @error('serviceType')
                                <p class="text-red-400 text-sm p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
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

                                @foreach ($classifications as $classification)
                                    <option value="{{ $classification->serviceClassification }}"
                                        class="text-[16px] Reg-font capitalize ">
                                        {{ $classification->serviceClassification }}</option>
                                @endforeach
                            </select>
                            @error('classification_service')
                                <p class="text-red-400 text-sm p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="p-2 w-96">
                            <label for="transaction_type" class="text-md Reg-font capitalize">Type of
                                Transaction:</label>
                            <select name="transaction_type" id="transaction_type"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 text-[16px] Reg-font capitalize">
                                <option value=""></option>
                                @foreach ($transactionType as $transaction)
                                    <option value="{{ $transaction->idTransactionType }}"
                                        class="text-[16px] Reg-font capitalize ">
                                        {{ $transaction->description }}</option>
                                @endforeach
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
                        <select name="who_avail" id="who_avail"
                            class=" bg-gray-100 border border-gray-300 p-2 mb-4 outline-none Reg-font"
                            spellcheck="false" placeholder="Who may Avail" type="text" autocomplete="off">
                            <option value=""></option>
                            @foreach ($whoAvail as $WhoAvail)
                                <option value="{{ $WhoAvail->client }}" class="text-[16px] Reg-font capitalize ">
                                    {{ $WhoAvail->client }}</option>
                            @endforeach
                        </select>
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
                            <div class="p-1 flex justify-end gap-5">
                                <button type="button" id="add_rqr_whr_row"
                                    class="text-sm Reg-font p-1 bg-green-500 rounded-lg text-white active:bg-green-600">
                                    Add new
                                    Rows</button>
                                <button type="button" id="dlt_rqr_whr_row"
                                    class="text-sm Reg-font p-1 bg-red-500 rounded-lg text-white active:bg-red-600">
                                    Delete Rows</button>
                            </div>
                            <div>
                                <table id="Rqr_Whr_id" name="Rqr_Whr_id"
                                    class="w-full text-sm text-gray-500 border-2 border-collapse">
                                    <thead
                                        class="text-xs Reg-font text-gray-700 uppercase bg-blue-800 text-white text-center">
                                        <th scope="row" class="py-3 px-6 text-center border-2 ">
                                            Check List of
                                            Requirements
                                        </th>
                                        <th scope="row" class="py-3 px-6 text-center border-2 ">
                                            Where to
                                            Secure
                                        </th>
                                    </thead>
                                    <tbody>
                                        <tr class="text-left">
                                            <td class="w-60 h-20 p-1 border-2">
                                                <textarea name="Rqr_Whr[0][checklist_of_requirement]" id="Rqr_Whr[0][checklist_of_requirement]"
                                                    class="w-full h-full"></textarea>
                                            <td class="w-60 h-20 p-1 border-2">
                                                <textarea name="Rqr_Whr[0][where_to_secure]" id="Rqr_Whr[0][where_to_secure]" class="w-full h-full"></textarea>
                                        </tr>
                                        <tr class="text-left">
                                            <td class="w-60 h-20 p-1 border-2">
                                                <textarea name="Rqr_Whr[1][checklist_of_requirement]" id="Rqr_Whr[1][checklist_of_requirement]"
                                                    class="w-full h-full"></textarea>
                                            <td class="w-60 h-20 p-1 border-2">
                                                <textarea name="Rqr_Whr[1][where_to_secure]" id="Rqr_Whr[1][where_to_secure]" class="w-full h-full"></textarea>
                                        </tr>
                                    </tbody>
                                </table>
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
                                    <tr class="text-left">
                                        <td class="w-40 h-28 p-1 border-2">
                                            <textarea name="table[0][client_steps]" id="table[0][client_steps]" class="w-full h-full"></textarea>
                                        </td>
                                        <td class="w-40 h-28 p-1 border-2">
                                            <textarea name="table[0][agency_action]" id="table[0][agency_action]" class="w-full h-full"></textarea>
                                        </td>
                                        <td class="w-40 h-28 p-1 border-2">
                                            <textarea name="table[0][fees_to_paid]" id="table[0][fees_to_paid]" class="w-full h-full"></textarea>
                                        </td>
                                        <td class="w-40 h-28 p-1 border-2">
                                            <textarea name="table[0][processing_time]" id="table[0][processing_time]" class="w-full h-full"></textarea>
                                        </td>
                                        <td class="w-40 h-28 p-1 border-2">
                                            <textarea name="table[0][person_responsible]" id="table[0][person_responsible]" class="w-full h-full"></textarea>
                                        </td>
                                    </tr>
                                    <tr class="text-left">
                                        <td class="w-40 h-28 p-1 border-2">
                                            <textarea name="table[1][client_steps]" id="table[1][client_steps]" class="w-full h-full"></textarea>
                                        </td>
                                        <td class="w-40 h-28 p-1 border-2">
                                            <textarea name="table[1][agency_action]" id="table[1][agency_action]" class="w-full h-full"></textarea>
                                        </td>
                                        <td class="w-40 h-28 p-1 border-2">
                                            <textarea name="table[1][fees_to_paid]" id="table[1][fees_to_paid]" class="w-full h-full"></textarea>
                                        </td>
                                        <td class="w-40 h-28 p-1 border-2">
                                            <textarea name="table[1][processing_time]" id="table[1][processing_time]" class="w-full h-full"></textarea>
                                        </td>
                                        <td class="w-40 h-28 p-1 border-2">
                                            <textarea name="table[1][person_responsible]" id="table[1][person_responsible]" class="w-full h-full"></textarea>
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
            setCellStyles(newCell, table.rows.length - 1, i); // Pass the row index and column index
        }
    }

    function deleteRow() {
        var table = document.getElementById("table_id");
        if (table.rows.length > 2) {
            table.deleteRow(-1);
        }
    }

    function setCellStyles(cell, rowIndex, columnIndex) {
        var textarea = document.createElement('textarea');
        textarea.value = cell.innerText;

        // Create a unique name and ID for each textarea based on the row and column indices
        var columnName = getColumnNameByIndex(columnIndex);
        textarea.name = "table[" + rowIndex + "][" + columnName + "]";
        textarea.id = "table[" + rowIndex + "][" + columnName + "]";

        textarea.style.width = "100%";
        textarea.style.height = "100%";
        textarea.style.padding = "0";
        textarea.style.border = "none";


        cell.innerText = '';
        cell.appendChild(textarea);
    }

    function getColumnNameByIndex(columnIndex) {
        // Define your own logic to get the column name based on the index
        // For example, you can use an array of column names or other data structure
        // Modify this logic as per your table structure
        var columnNames = ["client_steps", "agency_action", "fees_to_paid", "processing_time", "person_responsible"];
        return columnNames[columnIndex];
    }
</script>

<!--for handling the input fields of where to secure and requirements-->

<script>
    document.getElementById("add_rqr_whr_row").addEventListener("click", function() {
        addTheRow();
    });

    document.getElementById("dlt_rqr_whr_row").addEventListener("click", function() {
        deleteTheRow();
    });

    function addTheRow() {
        var table = document.getElementById("Rqr_Whr_id");
        var newRow = table.insertRow(-1);

        for (var i = 0; i < 2; i++) {
            var newCell = newRow.insertCell(i);
            newCell.className = "w-60 h-20 p-1 border-2";
            setTheCellStyles(newCell, table.rows.length - 1, i); // Pass the row index and column index
        }
    }

    function deleteTheRow() {
        var table = document.getElementById("Rqr_Whr_id");
        if (table.rows.length > 2) {
            table.deleteRow(-1);
        }
    }

    function setTheCellStyles(cell, rowIndex, columnIndex) {
        var textarea = document.createElement('textarea');
        textarea.value = cell.innerText;

        // Create a unique name and ID for each textarea based on the row and column indices
        var columnName = getTheColumnNameByIndex(columnIndex);
        textarea.name = "Rqr_Whr[" + rowIndex + "][" + columnName + "]";
        textarea.id = "Rqr_Whr[" + rowIndex + "][" + columnName + "]";

        textarea.style.width = "100%";
        textarea.style.height = "100%";
        textarea.style.padding = "0";
        textarea.style.border = "none";


        cell.innerText = '';
        cell.appendChild(textarea);
    }

    function getTheColumnNameByIndex(columnIndex) {
        // Define your own logic to get the column name based on the index
        // For example, you can use an array of column names or other data structure
        // Modify this logic as per your table structure
        var columnNames = ["checklist_of_requirement", "where_to_secure"];
        return columnNames[columnIndex];
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--for handling the data-->
<script>
    $(document).ready(function() {
        // Handle form submission
        $('form').on('submit', function(event) {
            event.preventDefault();

            // // Gather the data from dynamically generated fields
            // var rqrInputs = [];
            // var whrInputs = [];

            // $('#requirementsContainer input').each(function(index) {
            //     var rqrValue = $(this).val();
            //     var whrValue = $('#whr_secure input[name="requirements[' + index +
            //         '][whr_inpt]"]').val();
            //     rqrInputs.push(rqrValue);
            //     whrInputs.push(whrValue);
            // });
            // // Combine rqr_inpt and whr_inpt into a single array
            // var combinedInputs = [];
            // for (var i = 0; i < rqrInputs.length; i++) {
            //     combinedInputs.push({
            //         rqr_inpt: rqrInputs[i],
            //         whr_inpt: whrInputs[i]
            //     });
            // }

            // Gather the table of checklist and where to secure data
            var tableRqrWhrData = [];
            $('#Rqr_Whr_id tbody tr').each(function(index) {
                var row = $(this);
                var rowData = {
                    // Use the 'index' variable to match the row index
                    checkListOfRequirement: row.find('textarea[name="Rqr_Whr[' + index +
                        '][checklist_of_requirement]"]').val(),
                    whereToSecure: row.find('textarea[name="Rqr_Whr[' + index +
                        '][where_to_secure]"]').val()
                };
                tableRqrWhrData.push(rowData);
            });

            // Gather the table data
            var tableData = [];
            $('#table_id tbody tr').each(function(index) {
                var row = $(this);
                var rowData = {
                    // Use the 'index' variable to match the row index
                    clientSteps: row.find('textarea[name="table[' + index +
                        '][client_steps]"]').val(),
                    agencyAction: row.find('textarea[name="table[' + index +
                        '][agency_action]"]').val(),
                    feesToBePaid: row.find('textarea[name="table[' + index +
                        '][fees_to_paid]"]').val(),
                    processingTime: row.find('textarea[name="table[' + index +
                        '][processing_time]"]').val(),
                    personResponsible: row.find('textarea[name="table[' + index +
                        '][person_responsible]"]').val()
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
                    // rqr_whr_inpt: combinedInputs,
                    table_Rqr_Whr_data: JSON.stringify(
                        tableRqrWhrData), // Convert table data to JSON
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
