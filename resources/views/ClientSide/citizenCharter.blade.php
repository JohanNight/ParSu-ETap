@include('partials.headerClient')
<div class="relative">
    <!-- background Image -->
    <div class=" absolute w-full ">
        <img src="{{ asset('images/ImageForPSU/Entrance.jpg') }}" class="h-[100dvh] bg-no-repeat w-full opacity-80"
            alt="">
    </div>
    <div class=" min-h-screen w-full absolute">
        <!-- Header -->
        {{-- This is for the title and the logo --}}
        <div class="flex justify-center items-center bg-blue-900  w-full">
            <div class="flex justify-start ml-5">
                <form action="{{ route('HomePage') }}" method="get">
                    <button type="submit"
                        class="bg-gray-600 px-1 rounded-lg border-2 border-black hover:bg-yellow-500  transition duration-100 active:bg-yellow-700 Bold-font text-2xl text-white w-20 h-12 shadow-md ">
                        Back
                    </button>
                </form>
            </div>
            <div class="flex items-center mx-auto">
                <div class="relative h-22 p-[10px] mr-2">
                    <img src="{{ asset('images/NewPSUlogo.png') }}" alt="PSU logo" class="w-20 h-20" srcset="">
                </div>
                <div class="ml-[15px]">
                    <h1 class="text-3xl SemiB-font text-yellow-400">ParSU eTAP: Citizen Charter</h1>
                </div>
            </div>
        </div>

        <!--Search Section-->
        <div class="flex justify-center items-center mt-5" x-data="{ open: false }">

            <div class="relative flex ">
                {{-- <button id="button-dropdown" data-dropdown-toggle="dropdown"
                    class="bg-gray-50 flex-shrink-0 inline-flex items-center px-1 min-h-6 rounded-l-lg border border-gray-300 border-l text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring focus:outline-none focus:ring-gray-100 text-lg Reg-font"
                    type="button" @click="open = !open">Categories
                    <svg :class="{ 'transform rotate-180': open }" class="w-4 h-4 ml-2.5" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button> --}}

                {{-- <div x-show="open" @click.away="open = false"
                    class="bg-white rounded-lg mt-2 py-2 bg-white divide-y divide-gray-100 shadow-10 absolute z-50 top-12"
                    id="dropdown" style="min-width: 100px; max-height: 200px; overflow-y: auto;">
                    <ul class="py-2 text-sm text-gray-700 Reg-font capitalize">
                        @foreach ($office as $offices)
                            <li><button type="button"
                                    class="inline-flex w-full px-1 h-8 hover:bg-gray-100 active:bg-gray-400">{{ $offices->officeAcronym }}
                                </button>
                            </li>
                        @endforeach

                        <!-- Add more categories as needed -->
                    </ul>
                </div> --}}
                <!-- Search Bar -->
                <input type="search" name="search_bar" id="search-down"
                    class="block bg-gray-50 w-96 h-12 p-2.5 border-l-gray-50 border-l-2 rounded-l-lg border border-gray-300 focus:ring-0 focus:outline-none focus:ring-gray-100 text-lg Reg-font placeholder:text-lg placeholder:Reg-font "
                    placeholder="Search">
                <button type="submit" onclick="activateSearch()"
                    class="bg-gray-50 flex-shrink-0 inline-flex items-center px-4 w-16 min-h-8 rounded-r-lg border border-gray-300 border-r text-gray-900 text-bold bg-gray-100 border border-gray-300 rounded-r-lg hover:bg-sky-200 active:bg-blue-400 focus:outline-none   font-normal">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </button>
            </div>


        </div>
        <!--Search Data Section-->
        {{-- <section class="mt-10">
        </section> --}}

        <div class="overflow-x-auto relative w-full mt-10 ">
            <div class="">
                <!-- component -->
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="bg-blue-800 text-white border-b text-left">
                                        <tr>
                                            <th scope="col" class="text-sm SemiB-font  px-6 py-4 ">
                                                Code
                                            </th>
                                            <th scope="col" class="text-sm  SemiB-font px-6 py-4 ">
                                                Title
                                            </th>
                                            <th scope="col" class="text-sm  SemiB-font px-6 py-4 ">
                                                Offices
                                            </th>

                                            <th scope="col" class="text-sm  SemiB-font  px-6 py-4 ">
                                                Handle
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-left">
                                        @foreach ($services as $service)
                                            <tr
                                                class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm Med-font text-gray-900">
                                                    {{ $service->serviceCode }}</td>
                                                <td class="text-sm text-gray-900 Reg-font px-6 py-4 whitespace-nowrap">
                                                    {{ $service->serviceTitle }}
                                                </td>
                                                <td class="text-sm text-gray-900 Reg-font px-6 py-4 whitespace-nowrap">
                                                    @foreach ($office as $offices)
                                                        @if ($service->idOffice == $offices->idOffices)
                                                            {{ $offices->officeAcronym }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="/home/Document/{{ $service->idServiceSpecification }}"
                                                        class="bg-green-600 text-white text-sm px-3 py-1 rounded-2xl Reg-I-font active:bg-green-700">
                                                        View
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <div class="flex">
                                        {{ $services->links() }}
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script>
    function activateSearch() {
        // Get the search input element
        var searchInput = document.getElementById("search-down");

        // Get the search term
        var searchTerm = searchInput.value;

        // Make an AJAX request to the server with the search term
        fetch('/search?search=' + searchTerm)
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
            row.className = "bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100";

            var cells = [
                service.serviceCode,
                service.serviceTitle,
                service.officeAcronym,
                '<a href="/home/Document/' + service.idServiceSpecification +
                '" class="bg-green-600 text-white text-sm px-3 py-1 rounded-2xl Reg-I-font active:bg-green-700">View</a>'
            ];

            cells.forEach(cellText => {
                var cell = document.createElement("td");
                cell.className = "px-6 py-4 whitespace-nowrap text-sm Med-font text-gray-900";
                cell.innerHTML = cellText; // Use innerHTML to render HTML tags
                row.appendChild(cell);
            });

            tbody.appendChild(row);
        });
    }
</script>
@include('partials.footerClient')
