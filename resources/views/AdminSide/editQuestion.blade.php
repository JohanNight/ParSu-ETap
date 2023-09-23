@include('partials.headerClient')
<div class="bg-gray-50 min-h-screen">

    <x-navBarClient />{{-- Main Header --}}
    <div class="p-2">
        <form action="" method="">
            @csrf
            <div class="p-4">
                <button class="bg-green-500 px-4 py-2 rounded-md ml-5 mb-5 Reg-font text-[18px]" id="">
                    Edit
                </button>
            </div>

            {{-- Survey Number 1 --}}
            <div class="p-3 border-2 border-black w-full">
                <div class="w-full flex justify-between">
                    <div>
                        <h1 class="text-[20px] Bold-font">
                            Citizen's Charter Question
                        </h1>
                    </div>
                    <div>
                        <button id="addQuestion_id"
                            class="text-[15px] SemiB-font text-white bg-green-500 rounded-md p-2">
                            Add New Question
                        </button>
                    </div>
                </div>
                <div class="bg-white p-2 w-full shadow-lg mt-4 rounded-md mb-3">
                    <div class="w-full flex flex-col">
                        <div class="flex items-center gap-2">
                            <h1 class="text-[18px] Bold-font">
                                CC1
                            </h1>
                            <h3 class="text-[15px] Reg-font">
                                Which of the following best describes your awareness of a CC?
                            </h3>
                            <span class=" italic text-sm">
                                (Former Question)
                            </span>
                        </div>
                        <div class="mt-2 mb-3 flex flex-col gap-4">
                            <div class="gap-2">
                                <label for="question_num" class="text-[12px] Reg-font">Question Number: </label>
                                <input type="text" name="question_num" id="question_num"
                                    class="w-20 bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm"
                                    autocomplete="off">
                            </div>
                            <div class="gap-2 flex flex-col">
                                <label for="question_num" class="text-[12px] Reg-font">Description: </label>
                                {{-- <input type="text" name="question_num" id="question_num"
                                    class="w-96 bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm"
                                    autocomplete="off"> --}}
                                <textarea name="" id="" cols="30" rows="5"
                                    class="w-full bg-gray-100 border-2 px-1 py-1 focus:outline-none text-sm"></textarea>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="w-full flex justify-between items-center">
                                <div>
                                    <h1 class="text-[15px] Bold-font">
                                        Options
                                    </h1>
                                </div>
                                <div>
                                    <button id="option_id"
                                        class="text-[12px] SemiB-font text-white bg-green-500 rounded-md p-2 capitalize">
                                        Add New Option
                                    </button>
                                </div>
                            </div>
                            <div class="flex flex-col p-3 w-full gap-4 mt-4">
                                <div class="flex gap-2 w-full ">
                                    <label for="">1.</label>
                                    <input type="text" name="" id=""
                                        class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide">
                                    <button class="bg-red-500 text-white text-sm SemiB-font p-1 rounded-md">
                                        Delete
                                    </button>
                                </div>
                                <div class="flex gap-2 w-full ">
                                    <label for="">2.</label>
                                    <input type="text" name="" id=""
                                        class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide">
                                    <button class="bg-red-500 text-white text-sm SemiB-font p-1 rounded-md">
                                        Delete
                                    </button>
                                </div>
                                <div class="flex gap-2 w-full ">
                                    <label for="">3.</label>
                                    <input type="text" name="" id=""
                                        class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide">
                                    <button class="bg-red-500 text-white text-sm SemiB-font p-1 rounded-md">
                                        Delete
                                    </button>
                                </div>
                                <div class="flex gap-2 w-full ">
                                    <label for="">4.</label>
                                    <input type="text" name="" id=""
                                        class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide">
                                    <button class="bg-red-500 text-white text-sm SemiB-font p-1 rounded-md">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>

                    </div>
                </div>
                <div>

                </div>

                {{-- <div class="p-2 border-b-2 border-b-gray-700">
                    <label for="instruction_1" class="text-[15px] Reg-font mb-3">Survey Instruction 1</label>
                    <textarea name=""
                        id="instruction_1"class="w-full h-72 border-2 border-black px-3 py-2.5 text-[14px] Reg-font mt-2"> INSTRUCTIONS: Choose your answer to the Citizen’s Charter (CC) questions. The
                        Citizen’s Charter is an official document that reflects the services of a government agency/office including
                        its requirements, fees, and processing times among others.</textarea>

                </div>
                <div class="w-full mt-[12px] mr-[10px] ">
                    <div class="flex flex-col m-2 shadow-md w-full border-2 border-black">
                        <div class="p-2 mr-2 flex flex-1">
                            <div class="flex justify-center items-center gap-2 mr-3">
                                <label for="">Survey Num.</label>
                                <input type="text"
                                    class=" bg-white w-20 text-[12px] Reg-font p-1 border-2 border-black" value=" "
                                    autocomplete="off">
                            </div>
                            <div class="flex justify-center items-center gap-2 ml-3">
                                <label for="">Survey Question</label>
                                <input type="text"
                                    class=" bg-white w-96 text-[12px] Reg-font p-1 border-2 border-black" value=" "
                                    autocomplete="off">
                            </div>

                        </div>
                        <div class="flex flex-col space-y-2 ml-[50px] mt-5">
                            <label class="text-[16px] Reg-font">
                                <input type="radio" name="question1[]" value="1" id="cc1-answer1"
                                    class="cc1-answer1">
                                <span class="ml-3">1. I know
                                    what a CC is and I saw
                                    this office’s CC.</span>
                            </label>
                            <label class="text-[16px] Reg-font">
                                <input type="radio" name="question1[]" value="2"id="cc1-answer1"
                                    class="cc1-answer1"> <span class="ml-3">2. I know
                                    what a CC is but I did NOT see this office’s CC</span>
                            </label>
                            <label class="text-[16px] Reg-font">
                                <input type="radio" name="question1[]" value="3" id="cc1-answer1"
                                    class="cc1-answer1">
                                <span class="ml-3">3. I
                                    learned of the CC only when I saw this office’s CC.</span>
                            </label>
                            <label class="text-[16px] Reg-font">
                                <input type="radio" name="question1[]" value="4" id="cc1-answer1"
                                    class="cc1-answer1">
                                <span class="ml-3">4. I do
                                    not know what a CC is and I did not see one in this office. (Answer ‘N/A’ on CC2
                                    and
                                    CC3)</span>
                            </label>
                            <div class="w-full p-4">
                                <button type="button" class="w-full m-4 bg-blue-500">
                                    Add
                                </button>
                            </div>

                        </div>
                    </div>
                   
                    <div class="flex flex-col m-4">
                        <div class="w-full">
                            <label class="text-[18px] Reg-font tracking-wide"><span
                                    class="text-[18px] SemiB-font p-4">CC2
                                </span>If aware of CC (answered 1-3 in CC1), would you say that the CC of this
                                office
                                was
                                …?</label>
                        </div>
                        <div class="flex flex-col space-y-2 ml-[50px] mt-5">
                            <label class="text-[16px] Reg-font">
                                <input type="radio" name="question2[]" value="1" id="cc2-answer2"
                                    class="cc2-answer2">
                                <span class="ml-3">1. Easy
                                    to see</span>
                            </label>
                            <label class="text-[16px] Reg-font">
                                <input type="radio" name="question2[]" value="2" id="cc2-answer2"
                                    class="cc2-answer2">
                                <span class="ml-3">2.
                                    Somewhat easy to see</span>
                            </label>
                            <label class="text-[16px] Reg-font">
                                <input type="radio" name="question2[]" value="3" id="cc2-answer2"
                                    class="cc2-answer2">
                                <span class="ml-3">3.
                                    Difficult to see</span>
                            </label>
                            <label class="text-[16px] Reg-font">
                                <input type="radio" name="question2[]" value="4" id="cc2-answer2"
                                    class="cc2-answer2">
                                <span class="ml-3">4. Not
                                    visible at all</span>
                            </label>
                            <label class="text-[16px] Reg-font">
                                <input type="radio" name="question2[]" value="5" id="cc2-answer2"
                                    class="cc2-answer2">
                                <span class="ml-3">5.
                                    N/A</span>
                            </label>

                        </div>
                    </div>
                    
                    <div class="flex flex-col m-4">
                        <div class="w-full">
                            <label class="text-[18px] Reg-font tracking-wide"><span
                                    class="text-[18px] SemiB-font p-4">CC3
                                </span>If aware of CC (answered codes 1-3 in CC1), how much did the CC help you in
                                your
                                transaction?</label>
                        </div>
                        <div class="flex flex-col space-y-2 ml-[50px] mt-5">
                            <label class="text-[16px] Reg-font">
                                <input type="radio" name="question3[]" value="1" id="cc3-answer3"
                                    class="cc3-answer3">
                                <span class="ml-3">1.
                                    Helped very much </span>
                            </label>
                            <label class="text-[16px] Reg-font">
                                <input type="radio" name="question3[]" value="2" id="cc3-answer3"
                                    class="cc3-answer3">
                                <span class="ml-3">2.
                                    Somewhat helped</span>
                            </label>
                            <label class="text-[16px] Reg-font">
                                <input type="radio" name="question3[]" value="3" id="cc3-answer3"
                                    class="cc3-answer3">
                                <span class="ml-3">3. Did
                                    not help</span>
                            </label>
                            <label class="text-[16px] Reg-font">
                                <input type="radio" name="question3[]" value="4" id="cc3-answer3"
                                    class="cc3-answer3">
                                <span class="ml-3">4.
                                    N/A</span>
                            </label>


                        </div>
                    </div>
                </div> --}}
            </div>
            {{-- Survey Number 2 --}}
            {{-- <div class="relative mt-[10px] p-4 border-b-2 border-b-gray-400">
                <header class=" border-b-2 border-b-gray-700">
                    <h3 class="text-[18px] SemiB-font text-black text-center">
                        INSTRUCTIONS:
                        For SQD 0-8, please put a check mark (✔ ) on the column that best corresponds to your
                        answer.
                    </h3>
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
                            <tr>
                                <td class="border p-2">
                                    <span class="text-[18px] Bold-font text-justify">
                                        SQD0.
                                    </span>
                                    <label for="question-S2-Q0[]" id="question-S2-Q0[]"
                                        class="text-[18px] Reg-font text-justify">I am satisfied with the service that
                                        I availed.</label>
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q0[]" id="" value="5"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q0[]" id="" value="4"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q0[]" id="" value="3"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q0[]" id="" value="2"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q0[]" id="" value="1"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q0[]" id="" value="0"
                                        class="w-full">
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-2">
                                    <span class="text-[18px] Bold-font text-justify">
                                        SQD1.
                                    </span>
                                    <label for="question-S2-Q1[]" id="question-S2-Q1[]"
                                        class="text-[18px] Reg-font text-justify">I spent a reasonable amount of time
                                        for my transaction</label>
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q1[]" id="" value="5"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q1[]" id="" value="4"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q1[]" id="" value="3"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q1[]" id="" value="2"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q1[]" id="" value="1"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q1[]" id="" value="0"
                                        class="w-full">
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-2">
                                    <span class="text-[18px] Bold-font text-justify">
                                        SQD2.
                                    </span>
                                    <label for="question-S2-Q2[]" id="question-S2-Q2[]"
                                        class="text-[18px] Reg-font text-justify">The office followed the transaction’s
                                        requirements and steps based on
                                        the
                                        information provided.</label>
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q2[]" id="" value="5"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q2[]" id="" value="4"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q2[]" id="" value="3"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q2[]" id="" value="2"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q2[]" id="" value="1"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q2[]" id="" value="0"
                                        class="w-full">
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-2">
                                    <span class="text-[18px] Bold-font text-justify">
                                        SQD3.
                                    </span>
                                    <label for="question-S2-Q3[]" id="question-S2-Q3[]"
                                        class="text-[18px] Reg-font text-justify">The steps (including payment) I
                                        needed to do for my transaction were
                                        easy
                                        and
                                        simple</label>
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q3[]" id="" value="5"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q3[]" id="" value="4"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q3[]" id="" value="3"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q3[]" id="" value="2"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q3[]" id="" value="1"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q3[]" id="" value="0"
                                        class="w-full">
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-2">
                                    <span class="text-[18px] Bold-font text-justify">
                                        SQD4.
                                    </span>
                                    <label for="question-S2-Q4[]" id="question-S2-Q4[]"
                                        class="text-[18px] Reg-font text-justify">I easily found information about my
                                        transaction from the office or its
                                        website.</label>
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q4[]" id="" value="5"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q4[]" id="" value="4"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q4[]" id="" value="3"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q4[]" id="" value="2"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q4[]" id="" value="1"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q4[]" id="" value="0"
                                        class="w-full">
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-2">
                                    <span class="text-[18px] Bold-font text-justify">
                                        SQD5.
                                    </span>
                                    <label for="question-S2-Q5[]" id="question-S2-Q5[]"
                                        class="text-[18px] Reg-font text-justify">I paid a reasonable amount of fees
                                        for my transaction. (If service was
                                        free,
                                        mark the ‘N/A’ column)</label>
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q5[]" id="" value="5"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q5[]" id="" value="4"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q5[]" id="" value="3"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q5[]" id="" value="2"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q5[]" id="" value="1"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q5[]" id="" value="0"
                                        class="w-full">
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-2">
                                    <span class="text-[18px] Bold-font text-justify">
                                        SQD6.
                                    </span>
                                    <label for="question-S2-Q6[]" id="question-S2-Q6[]"
                                        class="text-[18px] Reg-font text-justify">I feel the office was fair to
                                        everyone, or “walang palakasan”, during
                                        my
                                        transaction.</label>
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q6[]" id="" value="5"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q6[]" id="" value="4"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q6[]" id="" value="3"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q6[]" id="" value="2"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q6[]" id="" value="1"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q6[]" id="" value="0"
                                        class="w-full">
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-2">
                                    <span class="text-[18px] Bold-font text-justify">
                                        SQD7.
                                    </span>
                                    <label for="question-S2-Q7[]" id="question-S2-Q7[]"
                                        class="text-[18px] Reg-font text-justify">I was treated courteously by the
                                        staff, and (if asked for help) the
                                        staff
                                        was
                                        helpful.</label>
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q7[]" id="" value="5"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q7[]" id="" value="4"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q7[]" id="" value="3"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q7[]" id="" value="2"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q7[]" id="" value="1"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q7[]" id="" value="0"
                                        class="w-full">
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-2">
                                    <span class="text-[18px] Bold-font text-justify">
                                        SQD8.
                                    </span>
                                    <label for="question-S2-Q8[]" id="question-S2-Q8[]"
                                        class="text-[18px] Reg-font text-justify">I got what I needed from the
                                        government office, or (if denied) denial
                                        of
                                        request was sufficiently explained to me.</label>
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q8[]" id="" value="5"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q8[]" id="" value="4"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q8[]" id="" value="3"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q8[]" id="" value="2"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q8[]" id="" value="1"
                                        class="w-full">
                                </td>
                                <td class="border p-2">
                                    <input type="radio" name="question-S2-Q8[]" id="" value="0"
                                        class="w-full">
                                </td>
                            </tr>

                        </tbody>
                    </table>

                </div>

            </div> --}}
            {{-- Survey 3 --}}
            {{-- <div class="mt-2 p-2 ">
                <div class="w-full flex flex-col">
                    <label for="suggestion_for_client"
                        class="text-[18px] SemiB-font tracking-wide text-left mb-2">Suggestions
                        on
                        how
                        we can
                        further improve our services (optional): </label>
                    <textarea name="suggestion_for_client" id="suggestion_for_client" cols="30" rows="10"
                        class="bg-gray-400 p-2 text-lg Reg-font placeholder:text-lg placeholder:Reg-font placeholder:text-black"
                        placeholder="Write Here"></textarea>
                </div>

            </div> --}}
            {{-- Submit button --}}
            <div class="mt-2 p-10 flex justify-center ">
                <button class="p-2 text-xl Reg-font bg-green-400 rounded active:bg-green-600" type="button">
                    Update
                </button>
            </div>
        </form>

    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        //to retrive the data and the populate them in each fields
        $(document).ready(function() {
            var categoryMapping = {
                'Student': 1,
                'Faculty': 2,
                'Personnel': 3,
                'Others': 4
            };
            $('#searchButton').on('click', function() {
                const csrfToken = $('meta[name="csrf-token"]').attr(
                    'content'); // Get the CSRF token from the meta tag
                const searchTerm = $('#search-id').val();
                // Send AJAX request to the server to fetch client data
                $.ajax({
                    url: 'http://127.0.0.1:8000/home/clientSurvey/Search',
                    method: 'POST',
                    data: {
                        '_token': csrfToken,
                        'searchId': searchTerm
                    },
                    dataType: 'json',
                    success: function(data) {
                        // Populate client info fields with retrieved data 
                        setTimeout(() => {
                            $('#name_of_client').val(data.name);
                            $('#gender_of_client').val(data.gender);
                            $('#age_of_client').val(data.age);
                            // Map the category string to its numeric value using categoryMapping
                            var numericCategory = categoryMapping[data
                                .category];
                            // Set the selected option in the client_type select element based on the numeric value
                            $('#client_type').val(numericCategory);

                            // Populate other fields as needed
                        }, 0);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        console.log("Status:", status);
                        console.error("XHR Error:", xhr);
                    }
                });
            });
        });

        // date_autofill.js
        // Get the current date in the format "YYYY-MM-DD"
        var today = new Date().toISOString().split('T')[0];

        // Set the input field's value to today's date
        document.getElementById("date_of_transaction").value = today;
    });
</script>

@include('partials.footerClient')
