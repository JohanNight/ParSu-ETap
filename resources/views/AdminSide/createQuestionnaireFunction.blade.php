@include('partials.headerClient')
<div class="bg-gray-50 min-h-screen">
    <div class="p-4 w-full flex justify-between">
        <a href="{{ route('index') }}" class="bg-blue-700 px-4 py-2 rounded-md ml-5 mb-5 Reg-font text-[18px] text-white"
            id="">
            Return
        </a>
        <button type="button" class="bg-blue-700 px-4 py-2 rounded-md ml-5 mb-5 Reg-font text-[18px] text-white"
            id="">
            Publish
        </button>

    </div>
    {{-- <x-navBarClient /> Main Header --}}
    <div class="p-2">
        <form action="" method="POST">
            @csrf
            <div class="flex justify-center items-center mb-4 mt-3">
                <header class="bg-blue-800 p-4 rounded-md">
                    <h1 class="text-[30px] SemiB-font text-yellow-400 ">
                        Edit Survey Question
                    </h1>
                </header>
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
                    {{-- Instruction --}}
                    <div class="mt-2 mb-3 gap-2 flex flex-col border-2 border-black p-1 rounded-md">
                        <label for="instruction" class="text-[15px] Reg-font">Instruction: </label>
                        <textarea name="instruction" id="instruction" cols="30" rows="3"
                            class="w-full bg-gray-100 border-2 px-1 py-1 focus:outline-none text-sm" autocomplete="off"></textarea>
                    </div>
                    <div class="set-question w-full flex flex-col border-2 border-black p-2 mb-3 rounded-md"
                        id="set_cc_question">
                        <div class="w-full flex justify-end">
                            <button id="dlt_qstn"
                                class="bg-red-500 text-white text-sm SemiB-font p-1 rounded-md active:bg-red-600"
                                type="button">
                                Delete Question
                            </button>
                        </div>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center gap-2">
                                <h1 class="text-[18px] Bold-font">
                                    CC1
                                </h1>
                                <h3 class="text-[15px] Reg-font">
                                    Which of the following best describes your awareness of a CC?
                                </h3>
                                <span class="SemiB-font text-sm">
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
                        {{-- Question Number and Questions --}}
                        <div class="mt-2 mb-3 flex flex-col gap-4">
                            <div class="gap-2 flex flex-col">
                                <label for="cc_question[]" class="text-[15px] Reg-font">CC Question: </label>
                                <input type="text" name="cc_question[0][]" id="cc_question[0][]"
                                    class="w-full h-12 bg-gray-100 border-2 px-1 py-1 focus:outline-none text-md Reg-font"
                                    autocomplete="off">
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
                                <div class="flex gap-2 w-full">
                                    <label for="option[][][]">1.</label>
                                    <input type="text" name="option[0][1][]" id="option[0][1][]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                    <button id="dlt_opt[1]"
                                        class="bg-red-500 text-white text-sm SemiB-font p-1 rounded-md active:bg-red-600"
                                        type="button">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Survey Number 2 --}}
                <div class="bg-white p-2 w-full shadow-lg mt-4 rounded-md mb-3 border-2 border-black">
                    <div class="w-full flex justify-between items-center mb-3 ">
                        <div>
                            <h1 class="text-[20px] Bold-font">
                                Survey Question
                            </h1>
                        </div>
                        <div>
                            <button id="addSrvyQuestion_id" type="button"
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
                    <div class="mt-2 mb-3 gap-2 flex flex-col border-2 border-black p-1 rounded-md">
                        <label for="instruction_SQstn" class="text-[15px] Reg-font">Instruction: </label>
                        <textarea name="instruction_SQstn" id="instruction_SQstn" cols="30" rows="3"
                            class="w-full bg-gray-100 border-2 px-1 py-1 focus:outline-none text-sm" autocomplete="off"></textarea>
                    </div>
                    <div class="survey_question flex flex-col p-3 w-full gap-4 mt-4 ">
                        <div class="flex gap-2 w-full ">
                            <label for="srvy_qstn[1]">1.</label>
                            <input type="text" name="srvy_qstn[1]" id="srvy_qstn[1]"
                                class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide">
                            <button id="dlt_srvy[1]"
                                type="button"class="bg-red-500 text-white text-sm SemiB-font p-1 rounded-md">
                                Delete
                            </button>
                        </div>
                        <div class="flex gap-2 w-full ">
                            <label for="srvy_qstn[2]">2.</label>
                            <input type="text" name="srvy_qstn[2]" id="srvy_qstn[2]"
                                class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide">
                            <button id="dlt_srvy[2]" type="button"
                                class="bg-red-500 text-white text-sm SemiB-font p-1 rounded-md">
                                Delete
                            </button>
                        </div>
                        <div class="flex gap-2 w-full ">
                            <label for="srvy_qstn[3]">3.</label>
                            <input type="text" name="srvy_qstn[3]" id="srvy_qstn[3]"
                                class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide">
                            <button id="dlt_srvy[3]" type="button"
                                class="bg-red-500 text-white text-sm SemiB-font p-1 rounded-md">
                                Delete
                            </button>
                        </div>
                        <div class="flex gap-2 w-full ">
                            <label for="srvy_qstn[4]">4.</label>
                            <input type="text" name="srvy_qstn[4]" id="srvy_qstn[4]"
                                class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide">
                            <button id="dlt_srvy[4]" type="button"
                                class="bg-red-500 text-white text-sm SemiB-font p-1 rounded-md">
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
                            <button id="edit_qstn" type="button"
                                class="text-[15px] SemiB-font text-white bg-green-500 rounded-md p-2 active:bg-green-600">
                                Edit
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
                            <label for="comment">1.</label>
                            <input type="text" name="comment" id="comment"
                                class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                readonly autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Submit button --}}
            <div class="mt-2 p-10 flex justify-center ">
                <button class="p-2 text-xl Reg-font bg-green-400 rounded active:bg-green-600" type="submit">
                    Save
                </button>
            </div>
        </form>

    </div>
</div>
<script>
    // function setupCcQuestionComponent() {
    //     let questionCount = 1;

    //     // Function to add a new question
    //     function addNewQuestion() {
    //         questionCount++;
    //         const questionContainer = document.querySelector(".set-question");
    //         const newQuestion = questionContainer.cloneNode(true);
    //         newQuestion.id = `cc_question_${questionCount}`;

    //         // Update label and input IDs for the new question
    //         // newQuestion.querySelector("label[for^='cc_question']").textContent = `CC Question: ${questionCount}`;
    //         newQuestion.querySelector("input[name^='cc_question']").name = `cc_question[${questionCount}]`;
    //         newQuestion.querySelector("input[name^='cc_question']").id = `cc_question[${questionCount}]`;
    //         newQuestion.querySelector("input[name^='cc_question']").value = ""; // Clear the input value

    //         newQuestion.querySelector("input[name^='option']").name = `option[${questionCount}][]`;
    //         newQuestion.querySelector("input[name^='option']").id = `option[${questionCount}][]`;
    //         newQuestion.querySelector("input[name^='option']").value = ""; // Clear the input value

    //         // Attach the delete question button event
    //         newQuestion.querySelector("#dlt_qstn").addEventListener("click", function() {
    //             newQuestion.remove();
    //         });

    //         // Add New Option Button for the new question
    //         newQuestion.querySelector("#add_OptionId").addEventListener("click", function() {
    //             addNewOption(newQuestion, questionCount);
    //         });

    //         // Append the new question to the container
    //         questionContainer.parentElement.appendChild(newQuestion);
    //     }

    //     // Function to add a new option within a question
    //     function addNewOption(questionContainer, questionCount) {
    //         const optionContainer = questionContainer.querySelector(".Option");
    //         const newOption = optionContainer.children[0].cloneNode(true);
    //         const optionNumber = optionContainer.childElementCount + 1;

    //         // Update label and input IDs for the new option
    //         newOption.querySelector("label").textContent = optionNumber + ".";
    //         newOption.querySelector("input").name = `option[${questionCount}][${optionNumber}]`;
    //         newOption.querySelector("input").id = `option[${questionCount}][${optionNumber}]`;
    //         newOption.querySelector("input").value = ""; // Clear the input value
    //         newOption.querySelector("button").id = `dlt_opt[${questionCount}]`;

    //         // Attach the delete option button event
    //         newOption.querySelector("button").addEventListener("click", function() {
    //             newOption.remove();
    //         });

    //         // Append the new option to the container
    //         optionContainer.appendChild(newOption);
    //     }

    //     // Attach the "Add Option" button click event for the original question
    //     document.querySelector(".set-question #add_OptionId").addEventListener("click", function() {
    //         const optionContainer = document.querySelector(".set-question .Option");
    //         addNewOption(optionContainer, 1); // Pass questionCount as 1 for the original question
    //     });

    //     // Attach the "Add Option" button click event for all questions
    //     document.querySelectorAll(".set-question #add_OptionId").forEach(function(addOptionButton, index) {
    //         addOptionButton.addEventListener("click", function() {
    //             const questionContainer = addOptionButton.closest(".set-question");
    //             const optionContainer = questionContainer.querySelector(".Option");
    //             addNewOption(questionContainer, index + 2); // Offset by 2 for generated questions
    //         });
    //     });

    //     // Attach the "Add Question" button click event
    //     document.getElementById("addQuestion_id").addEventListener("click", addNewQuestion);
    // }

    // // Initialize the component
    // setupCcQuestionComponent();

    function setupCcQuestionComponent() {
        let questionCount = 0; // Start with 0 for the original question
        let optionCount = 0; // Reset option count when a new question is added

        // Function to add a new question
        function addNewQuestion() {
            questionCount++;
            optionCount = 0; // Reset the option count when a new question is added
            const questionContainer = document.querySelector(".set-question");
            const newQuestion = questionContainer.cloneNode(true);
            newQuestion.id = `cc_question_${questionCount}`;

            // Update label and input IDs for the new question
            newQuestion.querySelector("label[for^='cc_question']").textContent = `CC Question: ${questionCount}`;
            newQuestion.querySelector("input[name^='cc_question']").name = `cc_question[${questionCount}]`;
            newQuestion.querySelector("input[name^='cc_question']").id = `cc_question[${questionCount}]`;
            newQuestion.querySelector("input[name^='cc_question']").value = ""; // Clear the input value

            // Attach the delete question button event
            newQuestion.querySelector("#dlt_qstn").addEventListener("click", function() {
                newQuestion.remove();
            });

            // Add New Option Button for the new question
            newQuestion.querySelector("#add_OptionId").addEventListener("click", function() {
                addNewOption(newQuestion, questionCount);
            });

            // Append the new question to the container
            questionContainer.parentElement.appendChild(newQuestion);
        }

        // Function to add a new option within a question
        function addNewOption(questionContainer, currentQuestionCount) {
            optionCount++;
            const optionContainer = questionContainer.querySelector(".Option");
            const newOption = optionContainer.children[0].cloneNode(true);
            const optionNumber = optionContainer.childElementCount + 1;

            // Update label and input IDs for the new option
            newOption.querySelector("label").textContent = optionNumber + ".";
            newOption.querySelector("input").name = `option[${currentQuestionCount}][${optionCount}][]`;
            newOption.querySelector("input").id = `option[${currentQuestionCount}][${optionCount}][]`;
            newOption.querySelector("input").value = ""; // Clear the input value
            newOption.querySelector("button").id = `dlt_opt[${currentQuestionCount}]`;

            // Attach the delete option button event
            newOption.querySelector("button").addEventListener("click", function() {
                newOption.remove();
            });

            // Append the new option to the container
            optionContainer.appendChild(newOption);
        }

        // Attach the "Add Option" button click event for the original question
        document.querySelector(".set-question #add_OptionId").addEventListener("click", function() {
            const optionContainer = document.querySelector(".set-question .Option");
            addNewOption(optionContainer, 1); // Pass 1 for the original question
        });

        // Attach the "Add Option" button click event for all questions
        document.querySelectorAll(".set-question #add_OptionId").forEach(function(addOptionButton, index) {
            addOptionButton.addEventListener("click", function() {
                const questionContainer = addOptionButton.closest(".set-question");
                addNewOption(questionContainer, index + 1); // Use index + 1 as question count
            });
        });

        // Attach the "Add Question" button click event
        document.getElementById("addQuestion_id").addEventListener("click", addNewQuestion);
    }

    // Initialize the component
    setupCcQuestionComponent();


    document.getElementById("addSrvyQuestion_id").addEventListener("click", function() {
        addNewQuestion();
    });

    function addNewQuestion() {
        const questionContainer = document.querySelector(".survey_question");

        // Create a new set of question fields
        const newQuestionDiv = document.createElement("div");
        newQuestionDiv.className = "flex gap-2 w-full";

        // Create label
        const label = document.createElement("label");
        label.setAttribute("for", `srvy_qstn[${questionContainer.childElementCount + 1}]`);
        label.textContent = `${questionContainer.childElementCount + 1}.`;

        // Create input field
        const input = document.createElement("input");
        input.type = "text";
        input.name = `srvy_qstn[${questionContainer.childElementCount + 1}]`;
        input.id = `srvy_qstn[${questionContainer.childElementCount + 1}]`;
        input.className = "w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide";

        // Create delete button
        const deleteButton = document.createElement("button");
        deleteButton.id = `dlt_srvy[${questionContainer.childElementCount + 1}]`;
        deleteButton.className = "bg-red-500 text-white text-sm SemiB-font p-1 rounded-md";
        deleteButton.textContent = "Delete";
        deleteButton.type = "button";
        deleteButton.addEventListener("click", function() {
            newQuestionDiv.remove();
        });

        // Append label, input, and delete button to the new question div
        newQuestionDiv.appendChild(label);
        newQuestionDiv.appendChild(input);
        newQuestionDiv.appendChild(deleteButton);

        // Append the new question div to the question container
        questionContainer.appendChild(newQuestionDiv);
    }

    function setupCommentQuestion() {
        const editButton = document.getElementById("edit_qstn");
        const commentInput = document.getElementById("comment");

        let isEditing = false;

        editButton.addEventListener("click", function() {
            isEditing = !isEditing;

            if (isEditing) {
                editButton.textContent = "Done";
                editButton.classList.remove("bg-green-500");
                editButton.classList.add("bg-blue-600", "active:bg-blue-700");
                commentInput.removeAttribute("readonly");
                commentInput.focus();
            } else {
                editButton.textContent = "Edit";
                editButton.classList.remove("bg-blue-600", "active:bg-blue-700");
                editButton.classList.add("bg-green-500");
                commentInput.setAttribute("readonly", true);
            }
        });
    }
    // Call the setupCommentQuestion function
    setupCommentQuestion();
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--for handling the data-->
<script>
    $(document).ready(function() {
        // Handle form submission
        $('form').on('submit', function(event) {
            event.preventDefault();
            // Create an empty object to store the data
            const formData = {
                cc_question: {},
                option: {},
            };

            // Collect data from the CC Instructions
            const instruction = document.getElementById('instruction').value;
            formData.cc_question[1] = instruction;

            // Collect data from Questions and Options
            const questionContainers = document.querySelectorAll('.set-question');
            questionContainers.forEach((questionContainer, index) => {
                const questionData = {
                    question: questionContainer.querySelector(
                        `input[name="cc_question[${index + 1}][]"]`).value,
                    options: [],
                };
                const optionInputs = questionContainer.querySelectorAll(
                    `input[name^="option[${index + 1}]"]`);
                optionInputs.forEach((optionInput, optionIndex) => {
                    questionData.options.push(optionInput.value);
                });
                formData.option[index + 1] = [questionData];
            });

            // Send all the data to the server using AJAX
            $.ajax({
                url: 'http://127.0.0.1:8000/indexAdmin/Create-questionnaire'
                data: {
                    _token: $('meta[name="csrf-token"]').attr(
                        'content'), // Include the CSRF token
                    formData: JSON.stringify(formData),
                },
                success: function(response) {
                    // Handle the success response or redirect to a success page
                },
                error: function(xhr, status, error) {
                    // Handle errors
                }
            });
        });
    });
</script>

@include('partials.footerClient')
