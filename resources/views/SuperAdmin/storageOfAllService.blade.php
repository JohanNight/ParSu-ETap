@include('partials.headerAdmin')

<div class="flex flex-col min-h-screen bg-gray-100">
    <!-- Top navigation bar -->
    <x-NavigationTop />
    <!-- Main content-->
    <div class="flex-1 flex flex-wrap">
        <!-- Navigation sidebar (hidden on small devices) -->
        <x-NavigationLeft />
        <!--Main Content Area-->
        <div class="flex-1 w-full md:w-96 p-5 bg-gray-200 min-h-screen">
            <!-- component -->
            <div class="heading text-center Bold-font text-2xl m-5 text-gray-800">Service Storage</div>
            <div
                class=" mx-auto w-full overflow-y-scroll text-gray-800 border border-gray-300 bg-white p-1 shadow-xl mb-6">
                <!-- component -->
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5 h-96">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="bg-white border-b text-center">
                                        <tr>
                                            <th scope="col"
                                                class="text-sm  SemiB-font text-gray-900 px-6 py-4 text-left">
                                                Code
                                            </th>
                                            <th scope="col"
                                                class="text-sm SemiB-font text-gray-900 px-6 py-4 text-left">
                                                Title
                                            </th>
                                            <th scope="col"
                                                class="text-sm SemiB-font text-gray-900 px-6 py-4 text-left">
                                                Office Number
                                            </th>
                                            <th scope="col"
                                                class="text-sm SemiB-font text-gray-900 px-6 py-4 text-left">
                                                Site
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $service)
                                            <tr class="bg-gray-100 border-b">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm Reg-font text-gray-900">
                                                    {{ $service->serviceCode }}
                                                </td>
                                                <td class="text-sm text-gray-900 Reg-font px-6 py-4 whitespace-nowrap">
                                                    {{ $service->serviceTitle }}
                                                </td>
                                                <td class="text-sm text-gray-900 Reg-font px-6 py-4 whitespace-nowrap">
                                                    @foreach ($offices as $office)
                                                        @if ($service->idOffice == $office->idOffices)
                                                            {{ $office->officeAcronym }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap flex justify-evenly  gap-5 items-center">
                                                    <a href="/indexAdmin/editService/{{ $service->idServiceSpecification }}"
                                                        class="bg-blue-800 active:bg-blue-900 text-white text-sm px-3 py-1 rounded-2xl Reg-font">
                                                        Edit
                                                    </a>
                                                    <form
                                                        action="/indexAdmin/serviceArchive/{{ $service->idServiceSpecification }}"
                                                        method="POST"
                                                        class="bg-blue-400 active:bg-blue-500 text-white text-sm px-3 py-1 rounded-2xl Reg-font">
                                                        @csrf
                                                        @method('PUT')
                                                        Archive
                                                    </form>
                                                    <form
                                                        action="/superAdmin/delete-service/{{ $service->idServiceSpecification }}"
                                                        method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit"
                                                            class="bg-red-600 active:bg-red-700 text-white text-sm px-3 py-1 rounded-2xl Reg-font">
                                                            Delete</button>
                                                    </form>

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

@include('partials.footerAdmin')
