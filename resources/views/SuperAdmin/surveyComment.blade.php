@include('partials.headerAdmin')
<!-- component -->
<div class="flex flex-col min-h-screen bg-gray-100">
    <!-- Top navigation bar -->
    <x-NavigationTop />

    <div class="flex-1 flex flex-wrap">
        <!-- Navigation sidebar (hidden on small devices) -->
        <x-NavigationLeft />

        <!--Main content area -->
        <div class="flex-1  py-2 px-4 w-full md:w-1/2 bg-gray-200 min-h-screen">

            <div
                class="flex flex-col sm:flex-row p-1 w-full justify-center items-center gap-2 rounded-md bg-white mt-2 mb-3 shadow-md">
                <!-- Search Date Form -->
                <div class="flex flex-col sm:flex-row justify-center items-center gap-1 w-full">

                    <div class="bg-white border-2 p-2">
                        <label for="FLTR_DATE" class="text-[18px] Reg-font ml-2">Search:</label>
                        <input type="date" name="FLTR_DATE" id="FLTR_DATE"
                            class="p-1 rounded-md border-2 border-black focus:outline-none">
                    </div>
                    <button type="submit" id="FLTR_DATE_btn" onclick="activateSearchDate()"
                        class="text-[18px] Reg-font bg-green-300 active:bg-green-400 rounded-md px-3 py-1">
                        search
                    </button>
                </div>

                <!-- Search Name Form -->
                <div class="flex flex-col sm:flex-row justify-center items-center gap-1 w-full">
                    <div class="bg-white border-2 p-2">
                        <label for="search_name" class="text-[18px] Reg-font ml-2">Search:</label>
                        <input type="search" name="search_name" id="search_name"
                            class="p-1 rounded-md border-2 border-black focus:outline-none" autocomplete="off">
                    </div>

                    <button type="submit" id="search_name_btn" onclick="activateSearch()"
                        class="text-[18px] Reg-font bg-blue-400 active:bg-blue-500 rounded-md px-3 py-1 text-white">
                        search
                    </button>
                </div>
            </div>
            <!-- Section 3 - Table of New Services -->
            <div class="mt-8 bg-white p-4 shadow rounded-lg">
                <h2 class="text-gray-500 text-xl SemiB-font pb-4 capitalize">Client's Surveyed Comment</h2>
                <div class="my-1"></div> <!-- Separation space -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <!-- Line with gradient -->
                <table class="w-full table-auto text-sm">
                    <thead>
                        <tr class="text-sm leading-normal text-center">
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                                Name</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                                Date</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                                Comment</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientInfo as $client)
                            <tr class="hover:bg-grey-lighter text-center">
                                <td class="py-2 px-4 border-b border-grey-light">{{ $client->name }}</td>
                                <td class="py-2 px-4 border-b border-grey-light">
                                    {{ $client->created_at }}
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light">
                                    @if ($client->comment != null)
                                        {{ $client->comment }}
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light"> <a
                                        href="/superAdmin/viewSurvey/{{ $client->idClientInformation }}"
                                        class="bg-blue-800 active:bg-blue-900 text-white text-sm px-3 py-1 rounded-2xl Reg-font">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        <!-- Add more rows here like the one above for each pending authorization -->
                </table>
                <div class="flex  justify-between  ">
                    <div class="mt-2">
                        {{ $clientInfo->links() }}
                    </div>

                    <div class=" text-[20px] Med-font">

                        Page {{ $clientInfo->currentPage() }} of {{ $clientInfo->lastPage() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Include the Axios library -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    // date_autofill.js
    // Get the current date in the format "YYYY-MM-DD"
    var dateFrom = new Date().toISOString().split('T')[0];

    // Set the input field's value to today's date
    document.getElementById("FLTR_DATE").value = dateFrom;
</script>

<script>
    function activateSearch() {
        // Get the search input element
        var searchInput = document.getElementById("search_name");

        // Get the search term
        var searchTerm = searchInput.value;

        // Make an AJAX request to the server with the search term
        fetch('/searchClient?search=' + searchTerm)
            .then(response => response.json())
            .then(data => updateTable(data))
            .catch(error => console.error('Error:', error));
    }

    function updateTable(data) {
        // Update the table with the new data
        var tbody = document.querySelector("tbody");
        tbody.innerHTML = '';

        data.forEach(service => {
            var row = document.createElement("tr");
            row.className = "hover:bg-grey-lighter text-center";

            var cells = [

                service.name,
                service.created_at,
                service.comment,
                '<a href="/superAdmin/viewSurvey/' + service.idClientInformation +
                '" class="bg-blue-800 active:bg-blue-900 text-white text-sm px-3 py-1 rounded-2xl Reg-font">View</a>'
            ];

            cells.forEach(cellText => {
                var cell = document.createElement("td");
                cell.className = "py-2 px-4 border-b border-grey-light";
                cell.innerHTML = cellText; // Use innerHTML to render HTML tags
                row.appendChild(cell);
            });

            tbody.appendChild(row);
        });
    }
</script>

<script>
    function activateSearchDate() {
        // Get the search input element
        var searchInput = document.getElementById("FLTR_DATE");

        // Get the search term
        var searchTerm = searchInput.value;

        // Make an AJAX request to the server with the search term
        fetch('/searchClientDate?searchDate=' + searchTerm)
            .then(response => response.json())
            .then(data => updateTable(data))
            .catch(error => console.error('Error:', error));
    }

    function updateTable(data) {
        // Update the table with the new data
        var tbody = document.querySelector("tbody");
        tbody.innerHTML = '';

        data.forEach(service => {
            var row = document.createElement("tr");
            row.className = "hover:bg-grey-lighter text-center";

            var cells = [

                service.name,
                service.created_at,
                service.comment,
                '<a href="/superAdmin/viewSurvey/' + service.idClientInformation +
                '" class="bg-blue-800 active:bg-blue-900 text-white text-sm px-3 py-1 rounded-2xl Reg-font">View</a>'
            ];

            cells.forEach(cellText => {
                var cell = document.createElement("td");
                cell.className = "py-2 px-4 border-b border-grey-light";
                cell.innerHTML = cellText; // Use innerHTML to render HTML tags
                row.appendChild(cell);
            });

            tbody.appendChild(row);
        });
    }
</script>


@include('partials.footerAdmin')
