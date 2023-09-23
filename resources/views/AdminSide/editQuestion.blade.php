@include('partials.headerClient')
<div class="bg-gray-50 min-h-screen">

    <x-navBarClient />{{-- Main Header --}}
    <div class="p-2">
        <form action="" method="">
            @csrf
            <div class="p-4 w-full flex justify-between">
                <button type="button" class="bg-green-500 px-4 py-2 rounded-md ml-5 mb-5 Reg-font text-[18px]"
                    id="">
                    Edit
                </button>
                <button type="button" class="bg-blue-700 px-4 py-2 rounded-md ml-5 mb-5 Reg-font text-[18px] text-white"
                    id="">
                    Publish
                </button>
            </div>


            <div class="p-2 border-2 border-black w-full">
                {{-- Survey Number 1 --}}
                <div class="bg-white p-2 w-full shadow-lg mt-4 rounded-md mb-3">
                    <div class="w-full flex justify-between items-center mb-3">
                        <div>
                            <h1 class="text-[20px] Bold-font">
                                Citizen's Charter Question
                            </h1>
                        </div>
                        <div>
                            <button id="addQuestion_id"
                                class="text-[15px] SemiB-font text-white bg-green-500 rounded-md p-2 active:bg-green-600"
                                type="button">
                                Add New Question
                            </button>
                        </div>
                    </div>
                    <div class="question w-full flex flex-col border-2 border-black p-2 mb-3" id="cc_question">
                        <div class="w-full flex justify-end">
                            <button
                                id="dlt_qstn"class="bg-red-500 text-white text-sm SemiB-font p-1 rounded-md active:bg-red-600"
                                type="button">
                                Delete Question
                            </button>
                        </div>
                        <div class="flex flex-col  gap-2">
                            <div class="flex items-center gap-2">
                                <h1 class="text-[18px] Bold-font">
                                    CC1
                                </h1>
                                <h3 class="text-[15px] Reg-font">
                                    Which of the following best describes your awareness of a CC?
                                </h3>
                                <span class=" SemiB-font text-sm">
                                    (Sample Format)
                                </span>
                            </div>

                            <div class="flex flex-col text-xs Reg-font ml-2">
                                <span>1. I know what a CC is and I saw this office’s CC</span>
                                <span>2. I know what a CC is but I did NOT see this office’s CC.</span>
                                <span>3. I learned of the CC only when I saw this office’s CC.</span>
                                <span>4. I do not know what a CC is and I did not see one in this office. (Answer ‘N/A’
                                    on CC2 and CC3)</span>
                            </div>
                        </div>
                        {{-- Question Number, Questions, and Instruction --}}
                        <div class="mt-2 mb-3 flex flex-col gap-4">
                            <div class="gap-2 flex flex-col">
                                <label for="instruction" class="text-[15px] Reg-font">Instruction: </label>
                                <textarea name="instruction" id="instruction" cols="30" rows="3"
                                    class="w-full bg-gray-100 border-2 px-1 py-1 focus:outline-none text-sm" autocomplete="off"></textarea>
                            </div>
                            <div class="gap-2">
                                <label for="question_num" class="text-[15px] Reg-font">Question Number: </label>
                                <input type="text" name="question_num" id="question_num"
                                    class="w-20 bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm"
                                    autocomplete="off">
                            </div>
                            <div class="gap-2 flex flex-col">
                                <label for="description" class="text-[15px] Reg-font">Description: </label>
                                <textarea name="description" id="description" cols="30" rows="5"
                                    class="w-full bg-gray-100 border-2 px-1 py-1 focus:outline-none text-sm" autocomplete="off"></textarea>
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
                                    <button id="add_OptionId" type="button"
                                        class="text-[12px] SemiB-font text-white bg-green-500 rounded-md p-2 capitalize active:bg-green-600">
                                        Add New Option
                                    </button>
                                </div>
                            </div>
                            <div class="Option flex flex-col p-3 w-full gap-4 mt-4">
                                <div class="flex gap-2 w-full ">
                                    <label for="option[1]">1.</label>
                                    <input type="text" name="option[1]" id="option[1]"
                                        class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                    <button id="dlt_opt[1]"
                                        class="bg-red-500 text-white text-sm SemiB-font p-1 rounded-md active:bg-red-600"
                                        type="button">
                                        Delete
                                    </button>
                                </div>
                                <div class="flex gap-2 w-full ">
                                    <label for="option[2]">2.</label>
                                    <input type="text" name="option[2]" id="option[2]"
                                        class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                    <button id="dlt_opt[2]"
                                        class="bg-red-500 text-white text-sm SemiB-font p-1 rounded-md active:bg-red-600"
                                        type="button">
                                        Delete
                                    </button>
                                </div>
                                <div class="flex gap-2 w-full ">
                                    <label for="option[3]">3.</label>
                                    <input type="text" name="option[3]" id="option[3]"
                                        class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                    <button id="dlt_opt[3]"
                                        class="bg-red-500 text-white text-sm SemiB-font p-1 rounded-md active:bg-red-600"
                                        type="button">
                                        Delete
                                    </button>
                                </div>
                                <div class="flex gap-2 w-full ">
                                    <label for="option[4]">4.</label>
                                    <input type="text" name="option[4]" id="option[4]"
                                        class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                    <button
                                        id="dlt_opt[4] "class="bg-red-500 text-white text-sm SemiB-font p-1 rounded-md active:bg-red-600"
                                        type="button">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Survey Number 2 --}}
                <div class="bg-white p-2 w-full shadow-lg mt-4 rounded-md mb-3">
                    <div class="w-full flex justify-between items-center mb-3 ">
                        <div>
                            <h1 class="text-[20px] Bold-font">
                                Survey Question
                            </h1>
                        </div>
                        <div>
                            <button id="addQuestion_id"
                                class="text-[15px] SemiB-font text-white bg-green-500 rounded-md p-2">
                                Add New Question
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 mt-2 mb-3 ">
                        <h3 class="text-[15px] Reg-font">
                            SQD0. I am satisfied with the service that I availed.
                        </h3>
                        <span class=" SemiB-font text-sm">
                            (Sample Question)
                        </span>
                    </div>
                    <div class="flex flex-col p-3 w-full gap-4 mt-4 border-2 border-black">
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
                {{-- Survey Number 3 --}}
                <div class="bg-white p-2 w-full shadow-lg mt-4 rounded-md mb-3 border-2 border-black">
                    <div class="w-full flex justify-between items-center mb-3 ">
                        <div>
                            <h1 class="text-[20px] Bold-font">
                                Comment Question
                            </h1>
                        </div>
                        <div>
                            <button id="addQuestion_id"
                                class="text-[15px] SemiB-font text-white bg-green-500 rounded-md p-2">
                                Add New Question
                            </button>
                        </div>

                    </div>
                    <div class="flex flex-col p-3 w-full gap-4 mt-4">
                        <div class="flex items-center gap-2">
                            <h3 class="text-[15px] Reg-font capotalize">
                                Any Comments?
                            </h3>
                            <span class="SemiB-font text-sm">
                                (Sample Question)
                            </span>
                        </div>
                        <div class="flex gap-2 w-full ">
                            <label for="">1.</label>
                            <input type="text" name="" id=""
                                class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide">
                            <button class="bg-red-500 text-white text-sm SemiB-font p-1 rounded-md">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Submit button --}}
            <div class="mt-2 p-10 flex justify-center ">
                <button class="p-2 text-xl Reg-font bg-green-400 rounded active:bg-green-600" type="button">
                    Save
                </button>
            </div>
        </form>

    </div>
</div>
<script>
    let questionCount = 1;

    // Function to add a new option field
    function addNewOption(optionContainer) {
        const newOption = optionContainer.children[0].cloneNode(true);
        const optionNumber = optionContainer.childElementCount + 1;

        // Update label and input IDs
        newOption.querySelector("label").textContent = optionNumber + ".";
        newOption.querySelector("input").id = `option[${optionNumber}]`;
        newOption.querySelector("button").id = `dlt_opt[${optionNumber}]`;

        // Clear input value
        newOption.querySelector("input").value = "";

        // Add the new option to the container
        optionContainer.appendChild(newOption);

        // Attach the delete option button event
        newOption.querySelector("button").addEventListener("click", function() {
            newOption.remove();
        });
    }

    // Add New Question Button
    document.getElementById("addQuestion_id").addEventListener("click", function() {
        questionCount++;
        const questionContainer = document.querySelector("#cc_question");

        // Clone the template question and add a unique ID
        const newQuestion = questionContainer.cloneNode(true);
        newQuestion.id = `cc_question_${questionCount}`;

        // Clear input values
        newQuestion.querySelectorAll("input, textarea").forEach((element) => {
            element.value = "";
        });

        // Add the new question to the container
        questionContainer.parentElement.appendChild(newQuestion);

        // Attach the delete question button event
        newQuestion.querySelector("#dlt_qstn").addEventListener("click", function() {
            newQuestion.remove();
        });

        // Add New Option Button for the new question
        newQuestion.querySelector("#add_OptionId").addEventListener("click", function() {
            const optionContainer = newQuestion.querySelector(".Option");
            addNewOption(optionContainer);
        });
    });

    // Add New Option Button for the original question
    document.getElementById("add_OptionId").addEventListener("click", function() {
        const optionContainer = document.querySelector(".Option");
        addNewOption(optionContainer);
    });
</script>

@include('partials.footerClient')
