@include('partials.headerAdmin')
<div class="bg-gray-50 h-full w-full">
    {{-- This is for the title and the logo --}}
    <div class="flex justify-center items-center bg-blue-900  w-full">

        <div class="flex justify-start ml-5">
            <form action="{{ route('viewSurveyAnswer') }}" method="get">
                <button type="submit" class=" px-1 rounded-lg Bold-font text-2xl text-white w-20 h-12 shadow-md ">
                    <svg xmlns="http://www.w3.org/2000/svg" height="50" width="50" viewBox="0 -960 960 960"
                        class="text-white" id="colorChangingSvg">
                        <path
                            d="M440-240 200-480l240-240 56 56-183 184 183 184-56 56Zm264 0L464-480l240-240 56 56-183 184 183 184-56 56Z"
                            fill="#3490dc" />
                    </svg>
                </button>
            </form>
        </div>

        <div class="flex items-center mx-auto">
            <div class="relative h-22 p-[10px] mr-2">
                <img src="{{ asset('images/NewPSUlogo.png') }}" alt="PSU logo" class="w-20 h-20" srcset="">
            </div>
            <div class="ml-[15px]">
                <h1 class="text-3xl SemiB-font text-yellow-400">ParSU eTAP: Satisfaction Survey</h1>
            </div>
        </div>
    </div>
    {{-- Description --}}
    <div class=" block mt-2 p-5 border-b-2 border-b-gray-700">
        <div class="mx-2 ">
            <p class="text-center text-[18px] Reg-font text-black tracking-wide leading-2">
                This Client Satisfaction Measurement (CSM) tracks the customer experience of government offices.
                Your
                feedback on your recently concluded transaction will help this office provide a better service.
                Personal
                information shared will be kept confidential and you always have the option to not answer this form.
            </p>
        </div>
    </div>

    {{-- Survey Form --}}
    <form action="#">
        @csrf
        {{-- Client Info --}}
        <div class="block p-5 flex flex-wrap mt-2 border-b-2 border-b-gray-700 ">
            <div class="block ml-3  mt-2">
                <label for="name_of_client" class="text-[20px] Reg-font mr-2 text-black">Name: </label>
                <input type="text" name="name_of_client" id="name_of_client"
                    class=" px-2 py-2 text-[16px] Reg-font w-96 sm:w-full bg-gray-300 rounded-md shadow-md"
                    value="{{ $clientInfo->name }}" autocomplete="off" readonly>

            </div>
            <div class="block ml-3 mt-2">
                <label for="gender_of_client" class="text-[20px] Reg-font mr-2 text-black">Gender: </label>
                <select name="gender_of_client" id="gender_of_client"
                    class=" w-40 bg-gray-300 py-2 px-2 mb-3 md:ml-0 sm:w-full  rounded-md shadow-md text-[16px] Reg-font"
                    disabled>
                    <option value=""@if (!$clientInfo->sex) selected @endif></option>
                    <option value="male" class="text-[16px] Reg-font"
                        @if ($clientInfo->sex == 'male') selected @endif>Male</option>
                    <option value="female" class="text-[16px] Reg-font"
                        @if ($clientInfo->sex == 'female') selected @endif>Female</option>
                </select>

            </div>
            <div class="block ml-3 mt-2 ">
                <label for="date_of_transaction" class="text-[20px] Reg-font mr-2 text-black">Date: </label>
                <input type="date" name="date_of_transaction" id="date_of_transaction"
                    class="px-2 py-2 Reg-font w-80 bg-gray-300 rounded-md shadow-md sm:w-full"autocomplete="off"
                    value="{{ $clientInfo->dateOfTransaction }}"readonly>
            </div>
            <div class="block ml-3 mt-2">
                <label for="offices" class="text-[20px] Reg-font mr-2 text-black">Office/Campus Visited: </label>
                <select name="offices" id="offices"
                    class="w-40 bg-gray-300 py-2 px-2 mb-3 md:ml-0 sm:w-full rounded-md shadow-md text-[16px] Reg-font"
                    disabled>
                    <option value=""></option>
                    @foreach ($officeTypes as $officeType)
                        <option value="{{ $officeType->idOffices }}" class="text-[16px] Reg-font capitalize"
                            @if ($clientInfo->idOfficeOrigin == $officeType->idOffices) selected @endif>
                            {{ $officeType->officeAcronym }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="block ml-3 mt-2 flex flex-col">
                <label for="service_availed" class="text-[20px] Reg-font mr-2 text-black">Service Avail: </label>
                <select type="text" name="service_availed" id="service_availed"
                    class="w-96 md:w-80 sm:w-80 px-2 py-2 Reg-font bg-gray-300 rounded-md shadow-md" autocomplete="off"
                    disabled>
                    <option value=""></option>
                    @foreach ($Service as $services)
                        <option value="{{ $services->idServiceSpecification }}" class="text-[12px] Reg-font capitalize"
                            @if ($clientInfo->service_avail == $services->idServiceSpecification) selected @endif>
                            {{ $services->serviceTitle }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="block ml-3 mt-2 ">
                <label for="purpose" class="text-[20px] Reg-font mr-2 text-black">Purpose: </label>
                <input type="text" name="purpose" id="purpose"
                    class=" w-full sm:w-full px-2 py-2 Reg-font bg-gray-300 rounded-md shadow-md"autocomplete="off"
                    value="{{ $clientInfo->purpose }}"readonly>
            </div>
            <div class="block ml-3 mt-2  ">
                <label for="email_of_client" class="text-[20px] Reg-font mr-2 text-black">Email address
                    (optional):
                </label>
                <input type="email" name="email_of_client" id="email_of_client"
                    class="w-full sm:w-full px-2 py-2 Reg-font bg-gray-300 rounded-md shadow-md " autocomplete="off"
                    value="{{ $clientInfo->email }}"readonly>

            </div>
        </div>


        {{-- Survey 3 --}}
        <div class="mt-2 p-2 ">
            <div class="w-full flex flex-col">
                @foreach ($SrvyComment as $srvyComment)
                    <label for="suggestion_for_client"
                        class="text-[18px] SemiB-font tracking-wide text-left mb-2">{{ $srvyComment->comment }}
                    </label>
                @endforeach
                <textarea name="suggestion_for_client" id="suggestion_for_client" cols="30" rows="10"
                    class="bg-gray-400 p-2 text-lg Reg-font placeholder:text-lg placeholder:Reg-font placeholder:text-black"
                    placeholder="Write Here" readonly>{{ $clientInfo->comment }}</textarea>


            </div>

        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@include('partials.footerAdmin')
