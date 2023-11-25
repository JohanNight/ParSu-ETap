@include('partials.headerClient')
<div class="bg-gray-50 min-h-screen w-full">
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
                    <h1 class="text-3xl SemiB-font text-yellow-400">ParSU eTAP: Satisfaction Survey</h1>
                </div>
            </div>
        </div>
        {{-- Description --}}
        <div class=" mt-2 p-5 border-b-2 border-b-gray-700">
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
        <form action="/home/WalkIn-clientSurvey/StoreData2" method="POST">
            @csrf
            {{-- Client Info --}}
            <div class="block p-5 flex flex-wrap mt-2 border-b-2 border-b-gray-700 ">
                {{-- Client Name --}}
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
                {{-- Client Gender --}}
                <div class="block ml-3 mt-2">
                    <label for="gender_of_client" class="text-[20px] Reg-font mr-2 text-black">Gender: </label>
                    <select name="gender_of_client" id="gender_of_client"
                        class=" w-40 bg-gray-300 py-2 px-2 mb-3 md:ml-0 sm:w-full  rounded-md shadow-md text-[16px] Reg-font">
                        <option value=""></option>
                        <option value="male" class="text-[16px] Reg-font">Male</option>
                        <option value="female" class="text-[16px] Reg-font">Female</option>
                    </select>
                    @error('gender_of_client')
                        <p class="text-red-400 text-sm p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                {{-- Client Age --}}
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
                        class=" w-48  sm:w-full bg-gray-300 py-2 px-2 mb-3  md:ml-0  rounded-md shadow-md text-[16px] Reg-font">
                        <option value=""></option>
                        @foreach ($clientTypes as $clientType)
                            <option value="{{ $clientType->idCategory }}" class="text-[16px] Reg-font capitalize ">
                                {{ $clientType->category }}</option>
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
                {{-- Office Or Campus Visited --}}
                <div class="block ml-3 mt-2 ">
                    <label for="offices" class="text-[20px] Reg-font mr-2 text-black">Office/Campus Visited: </label>
                    <select name="offices" id="offices"
                        class=" w-40 bg-gray-300 py-2 px-2 mb-3  md:ml-0 sm:w-full rounded-md shadow-md text-[16px] Reg-font">
                        <option value=""></option>
                        @foreach ($officeTypes as $officeType)
                            <option value="{{ $officeType->idOffices }}" class="text-[16px] Reg-font capitalize ">
                                {{ $officeType->officeAcronym }}</option>
                        @endforeach
                    </select>
                    @error('offices')
                        <p class="text-red-400 text-sm p-1">
                            {{ $message }}
                        </p>
                    @enderror
                    <button type="button" id="filterButton"
                        class="p-0.5 Bold-font text-[11px] bg-blue-500 border-2 border-blue-600 rounded active:bg-blue-600 uppercase">Filter</button>
                </div>
                {{-- Service Avail --}}
                <div class="block ml-3 mt-2 flex flex-col">
                    <label for="service_availed" class="text-[20px] Reg-font mr-2 text-black">Service Avail: </label>
                    <select type="text" name="service_availed" id="service_availed"
                        class=" w-96 md:w-80 sm:w-80 px-2 py-2 Reg-font bg-gray-300 rounded-md shadow-md"autocomplete="off">
                        <option value=""></option>
                        @foreach ($Service as $services)
                            <option value="{{ $services->idServiceSpecification }}"
                                class="text-[12px] Reg-font capitalize ">
                                {{ $services->serviceTitle }}</option>
                        @endforeach
                    </select>
                    @error('service_availed')
                        <p class="text-red-400 text-sm p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                {{-- Service Code --}}
                {{-- <div class="block ml-3  mt-2">
                    <label for="ServiceCode" class="text-[20px] Reg-font mr-2 text-black">Code: </label>
                    <input type="text" name="ServiceCode" id="ServiceCode"
                        class=" px-2 py-2 text-[16px] Reg-font w-96 sm:w-full bg-gray-300 rounded-md shadow-md"
                        value="" autocomplete="off">
                    @error('ServiceCode')
                        <p class="text-red-400 text-sm p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div> --}}
                {{-- Client Purpose --}}
                <div class="block ml-3 mt-2 ">
                    <label for="purpose" class="text-[20px] Reg-font mr-2 text-black">Purpose: </label>
                    <input type="text" name="purpose" id="purpose"
                        class=" w-full sm:w-full px-2 py-2 Reg-font bg-gray-300 rounded-md shadow-md"autocomplete="off">
                    @error('purpose')
                        <p class="text-red-400 text-sm p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                {{-- Client Email --}}
                <div class=" ml-3 mt-2 flex flex-wrap p-2 ">
                    <label for="email_of_client" class="text-lg Reg-font tracking-wide mt-2 mr-2">Email address
                        (optional):
                    </label>
                    <input type="email" name="email_of_client" id="email_of_client"
                        class="w-96 py-2.5 sm:w-full px-2 bg-gray-300 rounded text-[16px] Reg-font "
                        autocomplete="off">

                </div>
            </div>
            {{-- Survey Number 1 --}}
            <div class="p-3 border-b-2 border-b-gray-400">
                <header class="p-2 border-b-2 border-b-gray-700">
                    @foreach ($ccInstruction as $CCinstruction)
                        <h3 class="text-[18px] SemiB-font text-black text-center">
                            {{ $CCinstruction->instruction }}
                        </h3>
                    @endforeach

                </header>
                <div class="w-full mt-[12px] ml-[30px]">
                    {{-- Question 1 --}}
                    @foreach ($ccQuestions as $CCquestion)
                        <div class="flex flex-col m-4">
                            <div class="w-full">
                                <label
                                    class="text-[18px] Reg-font tracking-wide SemiB-font">{{ $CCquestion->description }}</label>
                            </div>
                            <div class="flex flex-col space-y-2 ml-[50px] mt-5">
                                @foreach ($CCquestion->CcOption as $index => $Option)
                                    @if ($Option->option_text)
                                        <label class="text-[16px] Reg-font">
                                            <input type="radio" name="question{{ $CCquestion->id }}"
                                                value="{{ $Option->id }}"
                                                id="cc{{ $CCquestion->id }}-answer{{ $CCquestion->id }}"
                                                class="cc{{ $CCquestion->id }}-answer{{ $CCquestion->id }}">
                                            <span class="ml-3">{{ $Option->option_text }}</span>
                                        </label>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- Survey Number 2 --}}
            <div class="relative mt-[10px] p-4 border-b-2 border-b-gray-400">
                <header class=" border-b-2 border-b-gray-700">
                    @foreach ($SrvyInstruction as $srvyInstruction)
                        <h3 class="text-[18px] SemiB-font text-black text-center">
                            {{ $srvyInstruction->instruction }}
                        </h3>
                    @endforeach

                </header>
                <div class="pt-2 pb-2 ">
                    <table class="w-full border-collapse border">
                        <thead>
                            <tr class=" text-20px Reg-font tracking-wide">
                                <th class="border p-2">

                                </th>
                                <th class="border p-2">
                                    <div class="flex justify-center items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="50"
                                            viewBox="0 -960 960 960" width="50">
                                            <path
                                                d="M480-260q68.957 0 124.815-39.337 55.859-39.337 80.381-103.533H274.804q24.522 64.196 80.381 103.533Q411.043-260 480-260ZM311.283-517.13 356-559.848l42.717 42.718 44.631-44.392L356-650.87l-89.348 89.348 44.631 44.392Zm250 0L604-559.848l44.717 42.718 44.631-44.392L604-650.87l-87.348 89.348 44.631 44.392ZM480-71.87q-84.674 0-159.109-32.097-74.435-32.098-129.63-87.294-55.196-55.195-87.294-129.63T71.869-480q0-84.674 32.098-159.109t87.294-129.63q55.195-55.196 129.63-87.294T480-888.131q84.674 0 159.109 32.098t129.63 87.294q55.196 55.195 87.294 129.63T888.131-480q0 84.674-32.098 159.109t-87.294 129.63q-55.195 55.196-129.63 87.294T480-71.869ZM480-480Zm0 317.13q132.565 0 224.848-92.282Q797.13-347.435 797.13-480t-92.282-224.848Q612.565-797.13 480-797.13t-224.848 92.282Q162.87-612.565 162.87-480t92.282 224.848Q347.435-162.87 480-162.87Z" />
                                        </svg>
                                    </div>
                                    <span>
                                        Strongly Agree
                                    </span>
                                </th>
                                <th class="border p-2">
                                    <div class="flex justify-center items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="50"
                                            viewBox="0 -960 960 960" width="50">
                                            <path
                                                d="M618.087-518.087q25.956 0 43.935-17.978Q680-554.043 680-580t-17.978-43.935q-17.979-17.978-43.816-17.978-25.836 0-43.815 18.041-17.978 18.042-17.978 43.816 0 25.773 17.988 43.871 17.988 18.098 43.686 18.098Zm-276.293 0q25.836 0 43.815-18.041 17.978-18.042 17.978-43.816 0-25.773-17.988-43.871-17.988-18.098-43.686-18.098-25.956 0-43.935 17.978Q280-605.957 280-580t17.978 43.935q17.979 17.978 43.816 17.978ZM480-260q68 0 123.5-38.5T684-400h-70.304q-21.522 35.565-56.946 55.989T480-323.587q-41.326 0-76.75-20.424T346.304-400H276q25 63 80.5 101.5T480-260Zm-.02 188.13q-84.654 0-159.089-32.097-74.435-32.098-129.63-87.294-55.196-55.195-87.294-129.65-32.098-74.455-32.098-159.109 0-84.654 32.098-159.089t87.294-129.63q55.195-55.196 129.65-87.294 74.455-32.098 159.109-32.098 84.654 0 159.089 32.098t129.63 87.294q55.196 55.195 87.294 129.65 32.098 74.455 32.098 159.109 0 84.654-32.098 159.089t-87.294 129.63q-55.195 55.196-129.65 87.294-74.455 32.098-159.109 32.098ZM480-480Zm0 317.13q132.565 0 224.848-92.282Q797.13-347.435 797.13-480t-92.282-224.848Q612.565-797.13 480-797.13t-224.848 92.282Q162.87-612.565 162.87-480t92.282 224.848Q347.435-162.87 480-162.87Z" />
                                        </svg>
                                    </div>
                                    <span>
                                        Agree
                                    </span>
                                </th>
                                <th class="border p-2">
                                    <div class="flex justify-center items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="50"
                                            viewBox="0 -960 960 960" width="50">
                                            <path
                                                d="M618.087-518.087q25.956 0 43.935-17.978Q680-554.043 680-580t-17.978-43.935q-17.979-17.978-43.816-17.978-25.836 0-43.815 18.041-17.978 18.042-17.978 43.816 0 25.773 17.988 43.871 17.988 18.098 43.686 18.098Zm-276.293 0q25.836 0 43.815-18.041 17.978-18.042 17.978-43.816 0-25.773-17.988-43.871-17.988-18.098-43.686-18.098-25.956 0-43.935 17.978Q280-605.957 280-580t17.978 43.935q17.979 17.978 43.816 17.978Zm18.206 180h240v-63.826H360v63.826ZM479.98-71.869q-84.654 0-159.089-32.098t-129.63-87.294q-55.196-55.195-87.294-129.65-32.098-74.455-32.098-159.109 0-84.654 32.098-159.089t87.294-129.63q55.195-55.196 129.65-87.294 74.455-32.098 159.109-32.098 84.654 0 159.089 32.098t129.63 87.294q55.196 55.195 87.294 129.65 32.098 74.455 32.098 159.109 0 84.654-32.098 159.089t-87.294 129.63q-55.195 55.196-129.65 87.294-74.455 32.098-159.109 32.098ZM480-480Zm0 317.13q132.565 0 224.848-92.282Q797.13-347.435 797.13-480t-92.282-224.848Q612.565-797.13 480-797.13t-224.848 92.282Q162.87-612.565 162.87-480t92.282 224.848Q347.435-162.87 480-162.87Z" />
                                        </svg>
                                    </div>
                                    <span>
                                        Neither Agree nor Disagree
                                    </span>
                                </th>
                                <th class="border p-2">
                                    <div class="flex justify-center items-center"><svg
                                            xmlns="http://www.w3.org/2000/svg" height="50"
                                            viewBox="0 -960 960 960" width="50">
                                            <path
                                                d="M618.087-518.087q25.956 0 43.935-17.978Q680-554.043 680-580t-17.978-43.935q-17.979-17.978-43.816-17.978-25.836 0-43.815 18.041-17.978 18.042-17.978 43.816 0 25.773 17.988 43.871 17.988 18.098 43.686 18.098Zm-276.293 0q25.836 0 43.815-18.041 17.978-18.042 17.978-43.816 0-25.773-17.988-43.871-17.988-18.098-43.686-18.098-25.956 0-43.935 17.978Q280-605.957 280-580t17.978 43.935q17.979 17.978 43.816 17.978ZM480-420q-68 0-123.5 38.5T276-280h70.304q21.522-35.565 56.946-55.989T480-356.413q41.326 0 76.75 20.424T613.696-280H684q-25-63-80.5-101.5T480-420Zm-.02 348.13q-84.654 0-159.089-32.097-74.435-32.098-129.63-87.294-55.196-55.195-87.294-129.65-32.098-74.455-32.098-159.109 0-84.654 32.098-159.089t87.294-129.63q55.195-55.196 129.65-87.294 74.455-32.098 159.109-32.098 84.654 0 159.089 32.098t129.63 87.294q55.196 55.195 87.294 129.65 32.098 74.455 32.098 159.109 0 84.654-32.098 159.089t-87.294 129.63q-55.195 55.196-129.65 87.294-74.455 32.098-159.109 32.098ZM480-480Zm0 317.13q132.565 0 224.848-92.282Q797.13-347.435 797.13-480t-92.282-224.848Q612.565-797.13 480-797.13t-224.848 92.282Q162.87-612.565 162.87-480t92.282 224.848Q347.435-162.87 480-162.87Z" />
                                        </svg></div>

                                    <span>
                                        Disagree
                                    </span>

                                </th>
                                <th class="border p-2">
                                    <div class="flex justify-center items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="50"
                                            viewBox="0 -960 960 960" width="50">
                                            <path
                                                d="M618.087-518.087q25.956 0 43.935-17.978Q680-554.043 680-580t-17.978-43.935q-17.979-17.978-43.816-17.978-25.836 0-43.815 18.041-17.978 18.042-17.978 43.816 0 25.773 17.988 43.871 17.988 18.098 43.686 18.098Zm-276.293 0q25.836 0 43.815-18.041 17.978-18.042 17.978-43.816 0-25.773-17.988-43.871-17.988-18.098-43.686-18.098-25.956 0-43.935 17.978Q280-605.957 280-580t17.978 43.935q17.979 17.978 43.816 17.978ZM480-422.87q-68.957 0-124.815 39.337Q299.326-344.196 274.804-280h410.392q-24.522-64.196-80.381-103.533Q548.957-422.87 480-422.87Zm-.02 351q-84.654 0-159.089-32.097-74.435-32.098-129.63-87.294-55.196-55.195-87.294-129.65-32.098-74.455-32.098-159.109 0-84.654 32.098-159.089t87.294-129.63q55.195-55.196 129.65-87.294 74.455-32.098 159.109-32.098 84.654 0 159.089 32.098t129.63 87.294q55.196 55.195 87.294 129.65 32.098 74.455 32.098 159.109 0 84.654-32.098 159.089t-87.294 129.63q-55.195 55.196-129.65 87.294-74.455 32.098-159.109 32.098ZM480-480Zm0 317.13q132.565 0 224.848-92.282Q797.13-347.435 797.13-480t-92.282-224.848Q612.565-797.13 480-797.13t-224.848 92.282Q162.87-612.565 162.87-480t92.282 224.848Q347.435-162.87 480-162.87Z" />
                                        </svg>
                                    </div>

                                    <span>
                                        Strongly Disagree
                                    </span>

                                </th>
                                <th class="border p-2">
                                    <div class="flex justify-center items-center">
                                        <h1 class="text-[30px] Reg-font uppercase">N/A</h1>
                                    </div>
                                    <span>
                                        Not Applicable
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($SrvyQuestion as $srvyQuestion)
                                <tr>
                                    <td class="border p-2">
                                        <label for="question-S2-Q{{ $srvyQuestion->id }}"
                                            id="question-S2-Q{{ $srvyQuestion->id }}"
                                            class="text-[18px] Reg-font text-justify Med-font">{{ $srvyQuestion->questions }}</label>
                                    </td>
                                    <td class="border p-2">
                                        <input type="radio" name="question-S2-Q{{ $srvyQuestion->id }}"
                                            id="" value="5" class="w-full">
                                    </td>
                                    <td class="border p-2">
                                        <input type="radio" name="question-S2-Q{{ $srvyQuestion->id }}"
                                            id="" value="4" class="w-full">
                                    </td>
                                    <td class="border p-2">
                                        <input type="radio" name="question-S2-Q{{ $srvyQuestion->id }}"
                                            id="" value="3" class="w-full">
                                    </td>
                                    <td class="border p-2">
                                        <input type="radio" name="question-S2-Q{{ $srvyQuestion->id }}"
                                            id="" value="2" class="w-full">
                                    </td>
                                    <td class="border p-2">
                                        <input type="radio" name="question-S2-Q{{ $srvyQuestion->id }}"
                                            id="" value="1" class="w-full">
                                    </td>
                                    <td class="border p-2">
                                        <input type="radio" name="question-S2-Q{{ $srvyQuestion->id }}"
                                            id="" value="0" class="w-full">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
            {{-- Survey 3 --}}
            <div class="mt-2 p-2 ">
                <div class="w-full flex flex-col">
                    @foreach ($SrvyComment as $srvyComment)
                        <label for="suggestion_for_client"
                            class="text-[18px] SemiB-font tracking-wide text-left mb-2">{{ $srvyComment->comment }}
                        </label>
                        <textarea name="suggestion_for_client" id="suggestion_for_client" cols="30" rows="10"
                            class="bg-gray-400 p-2 text-lg Reg-font placeholder:text-lg placeholder:Reg-font placeholder:text-black"
                            placeholder="Write Here"></textarea>
                    @endforeach

                </div>

            </div>
            {{-- Submit button --}}
            <div class="mt-2 p-10 flex justify-center ">
                <button class="py-4 Med-font  text-[30px] bg-green-400 rounded active:bg-green-600 w-full"
                    type="submit">
                    Submit
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

    // Get the current date in the format "YYYY-MM-DD"
    var today = new Date().toISOString().split('T')[0];

    // Set the input field's value to today's date
    document.getElementById("date_of_transaction").value = today;
</script>

@include('partials.footerClient')
