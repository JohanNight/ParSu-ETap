@include('partials.headerClient')
<div class="bg-gray-50 min-h-screen">

    <x-navBarClient />{{-- Main Header --}}
    <div class="pagecontainer">
        {{-- This is for the title and the logo --}}
        <div class="flex flex-col items-center  bg-blue-700 bg-opacity-50 w-full ">
            <div class="block flex justify-center items-center">
                <div class=" relative h-22 p-[10px] mr-2">
                    <img src="{{ asset('images/NewPSUlogo.png') }}" alt="PSU logo" class="w-20 h-20" srcset="">
                </div>
                <div class="ml-[20px]">
                    <h1 class="text-2xl SemiB-font text-yellow-400">ParSU E-Tap</h1>
                </div>
            </div>
            <div class="block">
                <h1 class="text-[30px] Bold-font text-black tracking-wide uppercase">
                    Help Us Serve You Better
                </h1>
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

        {{-- Search Engine --}}
        <form action="">
            @csrf
            <div class="flex justify-center items-center p-5 mb-4 gap-2">
                <input type="search" name="search-id" id="search-id"
                    class="bg-gray-300 rounded px-4 py-2.5 w-96 text-[18px] Reg-font placeholder:Reg-font placeholder:text-lg"
                    placeholder="Enter University Id" autocomplete="off" value="">
                <button type="button" id="searchButton"
                    class="p-2 Bold-font text-[12px] bg-blue-500 border-2 border-blue-600 rounded active:bg-blue-600 uppercase">search</button>
            </div>
        </form>
        {{-- Survey Form --}}
        <form action="">
            @csrf
            <div class="block p-5 flex flex-wrap mt-2  border-b-2 border-b-gray-700 ">
                <div class="block ml-3 ">
                    <label for="name_of_client" class="text-[20px] Reg-font mr-2 text-black">Name: </label>
                    <input type="text" name="name_of_client" id="name_of_client"
                        class=" px-2 py-2 text-[16px] Reg-font w-96 bg-gray-300 rounded-md shadow-md" value=""
                        autocomplete="off">
                </div>
                <div class="block ml-3">
                    <label for="gender_of_client" class="text-[20px] Reg-font mr-2 text-black">Gender: </label>
                    <select name="gender_of_client" id="gender_of_client"
                        class=" w-40 bg-gray-300 py-2 px-2 mb-3 sm:ml-10 md:ml-0  rounded-md shadow-md text-[16px] Reg-font">
                        <option value=""></option>
                        <option value="male" class="text-[16px] Reg-font">Male</option>
                        <option value="female" class="text-[16px] Reg-font">Female</option>
                    </select>
                </div>
                <div class="block ml-3">
                    <label for="age_of_client" class="text-[20px] Reg-font mr-2 text-black">Age: </label>
                    <input type="number" name="age_of_client" id="age_of_client"
                        class=" px-2 py-2 text-[16px] Reg-font w-40 bg-gray-300 rounded-md shadow-md"autocomplete="off"
                        value="">
                </div>
                <div class="block ml-3">
                    <label for="client_type" class="text-[20px] Reg-font mr-2 text-black">Client Type: </label>
                    <select name="client_type" id="client_type"
                        class=" w-48 bg-gray-300 py-2 px-2 mb-3 sm:ml-10 md:ml-0  rounded-md shadow-md text-[16px] Reg-font">
                        <option value=""></option>
                        @foreach ($clientTypes as $clientType)
                            <option value="{{ $clientType->idCategory }}" class="text-[16px] Reg-font capitalize ">
                                {{ $clientType->category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="block ml-3 mt-2 ">
                    <label for="date_of_transaction" class="text-[20px] Reg-font mr-2 text-black">Date: </label>
                    <input type="date" name="date_of_transaction" id="date_of_transaction"
                        class="px-2 py-2 Reg-font w-80 bg-gray-300 rounded-md shadow-md"autocomplete="off"
                        value="">
                </div>
                <div class="block ml-3 mt-2 ">
                    <label for="offices" class="text-[20px] Reg-font mr-2 text-black">Office: </label>
                    <select name="offices" id="offices"
                        class=" w-48 bg-gray-300 py-2 px-2 mb-3 sm:ml-10 md:ml-0  rounded-md shadow-md text-[16px] Reg-font">
                        <option value=""></option>
                        @foreach ($officeTypes as $officeType)
                            <option value="{{ $officeType->idOffices }}" class="text-[16px] Reg-font capitalize ">
                                {{ $officeType->officeAcronym }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="block ml-3 mt-2 ">
                    <label for="service_availed" class="text-[20px] Reg-font mr-2 text-black">Service Avail: </label>
                    <input type="text" name="service_availed" id="service_availed"
                        class=" w-72  px-2 py-2 Reg-font bg-gray-300 rounded-md shadow-md"autocomplete="off">
                </div>
                <div class="mt-2 flex flex-wrap p-2 ">
                    <label for="email_of_client" class="text-lg Reg-font tracking-wide mt-2 mr-2">Email address
                        (optional):
                    </label>
                    <input type="email" name="email_of_client" id="email_of_client"
                        class="w-96 py-2.5 px-2 bg-gray-300 rounded text-[16px] Reg-font " autocomplete="off">
                </div>
            </div>
        </form>

    </div>
</div>



@include('partials.footerClient')
