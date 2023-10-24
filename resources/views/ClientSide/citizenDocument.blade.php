@include('partials.headerClient')
<div class="relative">
    <div class=" absolute w-full ">
        <img src="{{ asset('images/Entrance.jpg') }}" class="min-h-screen bg-no-repeat w-full opacity-80" alt="">
    </div>
    <div class=" min-h-screen w-full absolute">
        <div class="w-full bg-blue-800 h-20 p-2 flex justify-start items-center">
            <a href="{{ route('CitizenCharter') }}"
                class="text-lg Reg-font bg-gray-400 text-white rounded-md p-2 active:bg-gray-500">Return</a>
        </div>
        <div class="flex justify-center mt-5">
            <div class="border-2 border-white w-10/12">
                <div class="p-4 bg-gray-100 w-full">
                    <div class=" flex justify-center mb-3 ">
                        <header class="border-b-2 border-b-blue-800">
                            <h1 class="text-lg Reg-font mb-1"><span
                                    class="text-[15px] text-md Bold-font mr-5 ">{{ $service1->code_Title }}</span>{{ $service1->service_Title }}
                            </h1>
                        </header>
                    </div>
                    <div class="p-5">
                        <p class="text-justify Reg-font text-md tracking-wider leading-7 mb-3">
                            {{ $service1->description_service }}
                        </p>
                        <div class="mb-2">
                            <table
                                class="w-full text-sm text-left text-gray-500 border-2 border-gray-300 border-collapse">
                                <tr scope ="row" class="border-b-2">
                                    <td
                                        class="bg-blue-800 text-white text-[15px] Reg-font w-80 h-10 border-r-2 border-r-white">
                                        Office or Division:
                                    </td>
                                    <td class="pl-4 text-black Reg-font text-[15px]">
                                        {{ $service1->office_service }}
                                    </td>
                                </tr>
                                <tr scope ="row" class="border-b-2">
                                    <td
                                        class="bg-blue-800 text-white text-[15px] Reg-font w-80 h-10 border-r-2 border-r-white">
                                        Classification:
                                    </td>
                                    <td class="pl-4 text-black Reg-font text-[15px]">
                                        {{ $service1->classification_service }}
                                    </td>
                                </tr>
                                <tr scope ="row" class="border-b-2">
                                    <td
                                        class="bg-blue-800 text-white text-[15px] Reg-font w-80 h-10 border-r-2 border-r-white">
                                        Type of Transaction
                                    </td>
                                    <td class="pl-4 text-black Reg-font text-[15px]">
                                        {{ $service1->transaction_type }}
                                    </td>
                                </tr>
                                <tr scope ="row" class="border-b-2">
                                    <td
                                        class="bg-blue-800 text-white text-[15px] Reg-font w-80 h-10 border-r-2 border-r-white">
                                        Who may Avail
                                    </td>
                                    <td class="pl-4 text-black Reg-font text-[15px]">
                                        {{ $service1->who_avail }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="mb-2">
                            <table id="Rqr_Whr_id"
                                class="w-full sm:text-sm text-left text-gray-500 border-2 border-gray-300 border-collapse">
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
                                    @foreach ($service1->checklistRequirements1 as $checklist)
                                        <tr class="text-left Reg-font">
                                            <td class="w-60 h-20 p-1 border-2">
                                                {{ $checklist->requirement_description }}
                                            <td class="w-60 h-20 p-1 border-2">
                                                {{ $checklist->where_to_secure }}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                                    @foreach ($service1->checklistRequirements2 as $checklist)
                                        <tr class="text-left Reg-font">
                                            <td class="w-40 h-28 p-1 border-2">
                                                {{ $checklist->client_steps }}
                                            </td>
                                            <td class="w-40 h-28 p-1 border-2 tracking-wide leading-5">
                                                {{ $checklist->agency_action }}
                                            </td>
                                            <td class="w-40 h-28 p-1 border-2">
                                                {{ $checklist->fees_to_be_paid }}
                                            </td>
                                            <td class="w-40 h-28 p-1 border-2">
                                                {{ $checklist->processing_time }}
                                            </td>
                                            <td class="w-40 h-28 p-1 border-2">
                                                {{ $checklist->person_responsible }}
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



@include('partials.footerClient')
