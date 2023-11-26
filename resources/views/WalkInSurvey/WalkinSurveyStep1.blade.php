@include('partials.headerClient')
<div class="bg-gray-50 min-h-screen w-full">
    {{-- Main Header --}}
    <div>
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
                    <h1 class="text-3xl SemiB-font text-yellow-400">ParSU eTAP</h1>
                </div>
            </div>
        </div>

        {{-- Description --}}
        <div class=" flex-col gap-5 block mt-2 p-5 border-b-2 border-b-gray-700">
            <div class="block text-center">
                <h1 class="text-[30px] Bold-font text-black tracking-wide uppercase">
                    Help Us Serve You Better
                </h1>
            </div>
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
        <form action="/home/WalkIn-clientSurvey" method="POST">
            @csrf
            {{-- Client Info --}}
            <div class="block p-5  mt-2 border-b-2 border-b-gray-700 ">
                {{-- Name --}}
                <div class="block ml-3  mt-2">
                    <label for="name_of_client" class="text-[20px] Reg-font mr-2 text-black">Name: </label>
                    <input type="text" name="name_of_client" id="name_of_client"
                        class=" px-2 py-2 text-[16px] Reg-font w-96 sm:w-full bg-gray-300 rounded-md shadow-md"
                        value="" autocomplete="off">
                    @error('name_of_client')
                        <p class="text-red-400 text-sm p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                {{-- Gender --}}
                <div class="block ml-3 mt-2">
                    <label for="gender_of_client" class="text-[20px] Reg-font mr-2 text-black">Gender: </label>
                    <select name="gender_of_client" id="gender_of_client"
                        class="w-40 bg-gray-300 py-2 px-2 mb-3 md:ml-0 sm:w-full rounded-md shadow-md text-[16px] Reg-font">
                        <option value="" @if (old('gender_of_client') == '') selected @endif></option>
                        <option value="male" class="text-[16px] Reg-font"
                            @if (old('gender_of_client') == 'male') selected @endif>
                            Male
                        </option>
                        <option value="female" class="text-[16px] Reg-font"
                            @if (old('gender_of_client') == 'female') selected @endif>
                            Female
                        </option>
                    </select>
                    @error('gender_of_client')
                        <p class="text-red-400 text-sm p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                {{-- Age --}}
                <div class="block ml-3 mt-2">
                    <label for="age_of_client" class="text-[20px] Reg-font mr-2 text-black">Age: </label>
                    <input type="number" name="age_of_client" id="age_of_client"
                        class=" px-2 py-2 text-[16px] Reg-font w-40 sm:w-full bg-gray-300 rounded-md shadow-md"autocomplete="off"
                        value="">
                    @error('age_of_client')
                        <p class="text-red-400 text-sm p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                {{-- Client Type --}}
                <div class="block ml-3 mt-2">
                    <label for="client_type" class="text-[20px] Reg-font mr-2 text-black">Client Type: </label>
                    <select name="client_type" id="client_type"
                        class="w-48 sm:w-full bg-gray-300 py-2 px-2 mb-3 md:ml-0 rounded-md shadow-md text-[16px] Reg-font">
                        <option value="" @if (old('client_type') == '') selected @endif></option>
                        @foreach ($clientTypes as $clientType)
                            <option value="{{ $clientType->idCategory }}" class="text-[16px] Reg-font capitalize "
                                @if (old('client_type') == $clientType->idCategory) selected @endif>
                                {{ $clientType->category }}
                            </option>
                        @endforeach
                    </select>
                    @error('client_type')
                        <p class="text-red-400 text-sm p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Date --}}
                <div class="block ml-3 mt-2 ">
                    <label for="date_of_transaction" class="text-[20px] Reg-font mr-2 text-black">Date: </label>
                    <input type="date" name="date_of_transaction" id="date_of_transaction"
                        class="px-2 py-2 Reg-font w-80 bg-gray-300 rounded-md shadow-md sm:w-full"autocomplete="off"
                        value="">
                </div>
                {{-- Office/Campus Visited --}}
                <div class="block ml-3 mt-2">
                    <label for="offices" class="text-[20px] Reg-font mr-2 text-black">Office/Campus Visited: </label>
                    <select name="offices" id="offices"
                        class="w-40 bg-gray-300 py-2 px-2 mb-3 md:ml-0 sm:w-full rounded-md shadow-md text-[16px] Reg-font">
                        <option value=""></option>
                        @foreach ($officeTypes as $officeType)
                            <option value="{{ $officeType->idOffices }}" class="text-[16px] Reg-font capitalize"
                                @if (old('offices') == $officeType->idOffices) selected @endif>
                                {{ $officeType->officeAcronym }}
                            </option>
                        @endforeach
                    </select>
                    @error('offices')
                        <p class="text-red-400 text-sm p-1">
                            {{ $message }}
                        </p>
                    @enderror
                    <button type="button" id="filterButton"
                        class="p-0.5 Bold-font text-[11px] bg-blue-500 border-2 border-blue-600 rounded active:bg-blue-600 uppercase">
                        Filter
                    </button>
                </div>

                {{-- Service Avail --}}
                <div class="block ml-3 mt-2 flex flex-col">
                    <label for="service_availed" class="text-[20px] Reg-font mr-2 text-black">Service Avail: </label>
                    <select type="text" name="service_availed" id="service_availed"
                        class="w-96 md:w-full sm:w-full px-2 py-2 Reg-font bg-gray-300 rounded-md shadow-md"
                        autocomplete="off">
                        <option value=""></option>
                        @foreach ($Service as $services)
                            <option value="{{ $services->idServiceSpecification }}"
                                class="text-[12px] Reg-font capitalize"
                                @if (old('service_availed') == $services->idServiceSpecification) selected @endif>
                                {{ $services->serviceTitle }}
                            </option>
                        @endforeach
                    </select>
                    @error('service_availed')
                        <p class="text-red-400 text-sm p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Purpose --}}
                <div class="block ml-3 mt-2 ">
                    <label for="purpose" class="text-[20px] Reg-font mr-2 text-black">Purpose: </label>
                    <input type="text" name="purpose" id="purpose"
                        class=" w-full sm:w-full px-2 py-2 Reg-font bg-gray-300 rounded-md shadow-md"autocomplete="off"
                        value="">
                    @error('purpose')
                        <p class="text-red-400 text-sm p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Email Address --}}
                <div class=" ml-3 mt-2 flex flex-wrap p-2 ">
                    <label for="email_of_client" class="text-lg Reg-font tracking-wide mt-2 mr-2">Email address
                        (optional):
                    </label>
                    <input type="email" name="email_of_client" id="email_of_client"
                        class="w-96 py-2.5 sm:w-full px-2 bg-gray-300 rounded text-[16px] Reg-font "
                        autocomplete="off" value="">

                </div>
            </div>
            {{-- Submit button --}}
            <div class="mt-2 p-10 flex justify-center ">
                <button class="py-4 Med-font  text-[30px] bg-green-400 rounded active:bg-green-600 w-full"
                    type="submit">
                    Next Page
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#filterButton').on('click', function() {
            var selectedOfficeId = $('#offices').val();

            $.ajax({
                type: 'GET',
                url: '/clientSurvey/selectService',
                data: {
                    office_id: selectedOfficeId
                },
                success: function(data) {
                    // Clear the current services dropdown
                    $('#service_availed').empty();

                    // Add an empty option at the beginning
                    $('#service_availed').append($('<option>', {
                        value: '', // Use an appropriate value for the empty option
                        text: '' // Specify the text for the empty option
                    }));

                    // Populate the services dropdown with the retrieved data
                    $.each(data, function(key, value) {
                        $('#service_availed').append($('<option>', {
                            value: value.idServiceSpecification,
                            text: value.serviceTitle
                        }));
                    });
                },
                error: function(xhr, status, error) {
                    console.log("XHR Response:", xhr);
                    console.log("Status:", status);
                    console.log("Error:", error);
                }
            });
        });
    });
    // date_autofill.js
    // Get the current date in the format "YYYY-MM-DD"
    var today = new Date().toISOString().split('T')[0];

    // Set the input field's value to today's date
    document.getElementById("date_of_transaction").value = today;
</script>

@include('partials.footerClient')
