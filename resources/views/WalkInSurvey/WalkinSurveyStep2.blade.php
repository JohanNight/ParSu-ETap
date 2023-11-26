@include('partials.headerClient')
<div class="bg-gray-50 min-h-screen w-full">
    {{-- This is for the title and the logo --}}
    <div class="flex justify-center items-center bg-blue-900  w-full">
        <div class="flex justify-start ">
            <form action="{{ route('Step1') }}" class="ml-2" method="get">
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


    <form action="/home/WalkIn-clientSurvey2" method="POST">
        @csrf
        {{-- Survey Number 1 --}}
        <div class="p-3 border-b-2 border-b-gray-400">
            <header class="border-b-2 border-b-gray-700">
                @foreach ($ccInstruction as $CCinstruction)
                    <h3 class="text-[18px] SemiB-font text-black text-center">
                        {{ $CCinstruction->instruction }}
                    </h3>
                @endforeach

            </header>
            <div class="w-full mt-[12px] ml-[30px]">
                {{-- Question 1 --}}
                @foreach ($ccQuestions as $CCquestion)
                    <div class=" m-4">
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
        <div class=" mt-[10px] p-4 border-b-2 border-b-gray-400">
            <header class=" border-b-2 border-b-gray-700">
                @foreach ($SrvyInstruction as $srvyInstruction)
                    <h3 class="text-[18px] SemiB-font text-black text-center">
                        {{ $srvyInstruction->instruction }}
                    </h3>
                @endforeach

            </header>
            <div class="pt-2 pb-2 ">
                <table class="max-h-[100px] overflow-y-auto w-full border-collapse border">
                    <thead class="sticky top-0 bg-white">
                        <tr class=" text-20px Reg-font tracking-wide">
                            <th class="border p-2">

                            </th>
                            <th class="border p-2">
                                <div class="flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="50" viewBox="0 -960 960 960"
                                        width="50">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" height="50" viewBox="0 -960 960 960"
                                        width="50">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" height="50" viewBox="0 -960 960 960"
                                        width="50">
                                        <path
                                            d="M618.087-518.087q25.956 0 43.935-17.978Q680-554.043 680-580t-17.978-43.935q-17.979-17.978-43.816-17.978-25.836 0-43.815 18.041-17.978 18.042-17.978 43.816 0 25.773 17.988 43.871 17.988 18.098 43.686 18.098Zm-276.293 0q25.836 0 43.815-18.041 17.978-18.042 17.978-43.816 0-25.773-17.988-43.871-17.988-18.098-43.686-18.098-25.956 0-43.935 17.978Q280-605.957 280-580t17.978 43.935q17.979 17.978 43.816 17.978Zm18.206 180h240v-63.826H360v63.826ZM479.98-71.869q-84.654 0-159.089-32.098t-129.63-87.294q-55.196-55.195-87.294-129.65-32.098-74.455-32.098-159.109 0-84.654 32.098-159.089t87.294-129.63q55.195-55.196 129.65-87.294 74.455-32.098 159.109-32.098 84.654 0 159.089 32.098t129.63 87.294q55.196 55.195 87.294 129.65 32.098 74.455 32.098 159.109 0 84.654-32.098 159.089t-87.294 129.63q-55.195 55.196-129.65 87.294-74.455 32.098-159.109 32.098ZM480-480Zm0 317.13q132.565 0 224.848-92.282Q797.13-347.435 797.13-480t-92.282-224.848Q612.565-797.13 480-797.13t-224.848 92.282Q162.87-612.565 162.87-480t92.282 224.848Q347.435-162.87 480-162.87Z" />
                                    </svg>
                                </div>
                                <span>
                                    Neither Agree nor Disagree
                                </span>
                            </th>
                            <th class="border p-2">
                                <div class="flex justify-center items-center"><svg xmlns="http://www.w3.org/2000/svg"
                                        height="50" viewBox="0 -960 960 960" width="50">
                                        <path
                                            d="M618.087-518.087q25.956 0 43.935-17.978Q680-554.043 680-580t-17.978-43.935q-17.979-17.978-43.816-17.978-25.836 0-43.815 18.041-17.978 18.042-17.978 43.816 0 25.773 17.988 43.871 17.988 18.098 43.686 18.098Zm-276.293 0q25.836 0 43.815-18.041 17.978-18.042 17.978-43.816 0-25.773-17.988-43.871-17.988-18.098-43.686-18.098-25.956 0-43.935 17.978Q280-605.957 280-580t17.978 43.935q17.979 17.978 43.816 17.978ZM480-420q-68 0-123.5 38.5T276-280h70.304q21.522-35.565 56.946-55.989T480-356.413q41.326 0 76.75 20.424T613.696-280H684q-25-63-80.5-101.5T480-420Zm-.02 348.13q-84.654 0-159.089-32.097-74.435-32.098-129.63-87.294-55.196-55.195-87.294-129.65-32.098-74.455-32.098-159.109 0-84.654 32.098-159.089t87.294-129.63q55.195-55.196 129.65-87.294 74.455-32.098 159.109-32.098 84.654 0 159.089 32.098t129.63 87.294q55.196 55.195 87.294 129.65 32.098 74.455 32.098 159.109 0 84.654-32.098 159.089t-87.294 129.63q-55.195 55.196-129.65 87.294-74.455 32.098-159.109 32.098ZM480-480Zm0 317.13q132.565 0 224.848-92.282Q797.13-347.435 797.13-480t-92.282-224.848Q612.565-797.13 480-797.13t-224.848 92.282Q162.87-612.565 162.87-480t92.282 224.848Q347.435-162.87 480-162.87Z" />
                                    </svg></div>

                                <span>
                                    Disagree
                                </span>

                            </th>
                            <th class="border p-2">
                                <div class="flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="50" viewBox="0 -960 960 960"
                                        width="50">
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
                                    <input type="radio" name="question-S2-Q{{ $srvyQuestion->id }}" id=""
                                        value="5" class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q{{ $srvyQuestion->id }}" id=""
                                        value="4" class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q{{ $srvyQuestion->id }}" id=""
                                        value="3" class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q{{ $srvyQuestion->id }}" id=""
                                        value="2" class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q{{ $srvyQuestion->id }}" id=""
                                        value="1" class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q{{ $srvyQuestion->id }}" id=""
                                        value="0" class="w-full">
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
            <button class="py-4 Med-font  text-[30px] bg-green-400 rounded active:bg-green-600 w-full" type="submit">
                Submit
            </button>
        </div>
    </form>

</div>

@include('partials.footerClient')
